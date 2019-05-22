<?php

namespace App\Repositories;

use App\Models\CareerCategory;
use App\Models\CareerCity;
use App\Traits\UploadPhotoTrait;
use Carbon\Carbon;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CareerRepository;
use App\Models\Career;
use App\Validators\CareerValidator;

/**
 * Class CareerRepositoryEloquent
 *
 * @package namespace App\Repositories;
 */
class CareerRepositoryEloquent extends BaseRepository implements CareerRepository
{
    use UploadPhotoTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Career::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return CareerValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function datatable()
    {
        return $this->model->select('*')->withTranslation();
    }

    public function create(array $input)
    {

        $input['published_date'] = !empty($input['published_date']) ? cvDbTime($input['published_date'], PHP_DATE, DB_DATE) : date("Y-m-d");

        $input['expired_date'] = !empty($input['expired_date']) ? cvDbTime($input['expired_date'], PHP_DATE, DB_DATE) : date("Y-m-d");

        $input['is_top'] = !empty($input['is_top']) ? 1 : 0;

        $input['is_manager'] = !empty($input['is_manager']) ? 1 : 0;

        $input['accept_aplly'] = !empty($input['accept_aplly']) ? 1 : 0;

        $model = $this->model->create($input);

        $model->cities()->attach($input['city_id']);

        if (!empty($input['metadata'])) {
            $model->metaCreateOrUpdate($input['metadata']);
        }

        $model->updateSlugTranslation();

        return $model;
    }

    public function update(array $input, $id)
    {
        $model = $this->model->findOrFail($id);

        $input['is_top'] = !empty($input['is_top']) ? 1 : 0;

        $input['is_manager'] = !empty($input['is_manager']) ? 1 : 0;

        $input['accept_aplly'] = !empty($input['accept_aplly']) ? 1 : 0;

        $input['published_date'] = !empty($input['published_date']) ? cvDbTime($input['published_date'], PHP_DATE, DB_DATE) : date("Y-m-d");

        $input['expired_date'] = !empty($input['expired_date']) ? cvDbTime($input['expired_date'], PHP_DATE, DB_DATE) : date("Y-m-d");

        $model->update($input);

        $career = CareerCity::firstOrNew(['career_id'=>$id]);
        $career->city_id = $input['city_id'];
        $career->save();

        if (!empty($input['metadata'])) {
            $model->metaCreateOrUpdate($input['metadata']);
        }

        $model->updateSlugTranslation();

        return $model;
    }

    public function delete($id)
    {
        $model = $this->model->findOrFail($id);
        $model->cities()->detach();
        $model->delete();
    }

    public function search(array $input)
    {
        $date = Carbon::now()->toDateString();

        $model = $this->model->select('*')
            ->requiredTranslation('name')
            ->withTranslation()
            ->where('employer','LHC')
            ->where('expired_date', '>=', $date)
            ->where('status','PUBLISH')
            ->orderBy('is_top', 'desc')
            ->orderBy('published_date', 'desc');

        if ( !empty($input['k']) ) {
            
            $search_key = trim($input['k']);
            $model->whereTranslationLike('name', '%' . $search_key . '%');
        }

        if (!empty($input['c'])) {
            $model->where('category_id', $input['c']);
        }

        return $model->paginate(10);
    }

    public function findBySlug($slug)
    {   
        $date = Carbon::now()->toDateString();

        $locale = \App::getLocale();
        return $this->model
            ->whereTranslation('slug', $slug, $locale)
            ->where('status','PUBLISH')
            ->withTranslation()
            ->with('category')
            ->firstOrFail();
    }

    public function related($careers)
    {   
        $date = Carbon::now()->toDateString();

        $model = $this->model->select('*')
            ->requiredTranslation()
            ->where('expired_date', '>=', $date)
            ->withTranslation()
            ->where('status','PUBLISH');

            if($careers){
                $model->where('employer', $careers->employer)
                        ->where('id', '<>', $careers->id);
            }

            $model->orderBy('is_top', 'desc')
            ->orderBy('published_date', 'desc');

            return $model->get();
    }

    public function apply(array $input)
    {
        $career = $this->model->findOrFail($input['career_id']);

        $input['birthday'] = $input['birthday_year'] . '-' . $input['birthday_month'] . '-' . $input['birthday_day'];

        if (!empty($input['attach_file'])) {
            $config = config('files.career_apply_resume');
            $path = \Storage::putFile($config['path'], $input['attach_file']);
            $input['attach_file'] = $path;
        }

        if (!empty($input['image'])) {
            $config = config('files.career_apply_resume');
            $path = \Storage::putFile($config['path'], $input['image']);
            $input['image'] = $path;
        }

        $apply = $career->applies()->create($input);

        return $apply;
    }


    public function listCareers($limit = 10, $filter = [])
    {
        $model = $this->model
            ->withTranslation()
            ->where('expired_date', '>=', Carbon::now())
            ->orderBy('published_date', 'desc')
            // ->orderBy('employer', 'asc')
            ->orderBy('is_top', 'desc')
            ->where('status','PUBLISH');

        if(isset($filter['q']) && $filter['q'])
            $model = $model->whereTranslationLike('name','%'. $filter['q'] .'%');

        if(isset($filter['category_id']) && $filter['category_id'])
            $model = $model->where('category_id', $filter['category_id']);

        if(isset($filter['level_id']) && $filter['level_id'])
            $model = $model->where('level_id', $filter['level_id']);

        if(isset($filter['city_id']) && $filter['city_id']) {
            $model->whereHas('cities', function($query) use ($filter){
                $query->where('city_id', $filter['city_id']);
            });
        }

        if(isset($filter['type']))
        {
            switch ($filter['type'])
            {
                case 1:{
                    $model = $model->where('created_at', '>=',Carbon::now()->subDays(7));
                } break;

                case 2:{
                    $model = $model->top();
                } break;

                case 3:{
                    $model = $model->manager();
                } break;
            }

        }

        return $model->paginate($limit);
    }

}
