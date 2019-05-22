<?php

namespace App\Repositories;

use App\Jobs\ExportBranchToXmlJob;
use App\Traits\UploadPhotoTrait;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BranchRepository;
use App\Models\Branch;
use App\Validators\BranchValidator;

/**
 * Class BranchRepositoryEloquent
 * @package namespace App\Repositories;
 */
class BranchRepositoryEloquent extends BaseRepository implements BranchRepository
{
    use UploadPhotoTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Branch::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return BranchValidator::class;
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
        return $this->model->select('*', \DB::raw('IF(type = "head_office", 1, IF(type = "distribution_center", 2, IF(type = "store", 3, IF(type = "supermarket", 4, 5)))) as sort_type'))
            ->withTranslation()
            ->orderBy('parent_id', 'asc')
            ->orderBy('sort_type', 'asc')
            ->orderBy('id', 'asc');
    }

    public function store(array $input)
    {
        // Save photo
        if (!empty($input['branch_image'])) {
            $config = config('files.branch_image');

            $info = $this->storePhoto($input['branch_image'], $config);

            $input['image'] = $info['full_path'];
        }

        if (!empty($input['branch_icon'])) {
            $config = config('files.branch_icon');

            $info = $this->storePhoto($input['branch_icon'], $config);

            $input['icon'] = $info['full_path'];
        }

        $model =  $this->model->create($input);

        //dispatch(new ExportBranchToXmlJob());

        return $model;
    }

    public function update(array $input, $id)
    {
        $model = $this->model->findOrFail($id);

        if (!empty($input['delete_image'])) {
            $this->destroySinglePhoto($input['delete_image']);
            $input['image'] = null;
        }

        if (!empty($input['delete_icon'])) {
            $this->destroySinglePhoto($input['delete_icon']);
            $input['icon'] = null;
        }

        // Save photo
        if (!empty($input['branch_image'])) {
            $config = config('files.branch_image');

            $info = $this->storePhoto($input['branch_image'], $config);

            $input['image'] = $info['full_path'];
        }

        if (!empty($input['branch_icon'])) {
            $config = config('files.branch_icon');

            $info = $this->storePhoto($input['branch_icon'], $config);

            $input['icon'] = $info['full_path'];
        }

        $model->update($input);

        //dispatch(new ExportBranchToXmlJob());

        return $model;
    }

    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);

        if (!empty($model->image)) {
            $this->destroySinglePhoto($model->image);
        }

        if (!empty($model->icon)) {
            $this->destroySinglePhoto($model->icon);
        }

        foreach ($model->children as $rs){
            $this->destroy($rs->id);
        }

        $model->delete();
    }

    public function branches(array $arr = [])
    {
        $model = $this->model->select('*');
        if (!empty($arr['type'])) {
            $model->where('type', $arr['type']);
        }
        if (!empty($arr['city_id'])) {
            $model->where('city_id', $arr['city_id']);
        }
        if (isset($arr['parent_id']) && $arr['parent_id'] !== '') {
            $model->where('parent_id', $arr['parent_id']);
        }

        return $model->withTranslation()->get();
    }
}
