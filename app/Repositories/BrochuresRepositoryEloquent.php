<?php

namespace App\Repositories;

use App\Models\Brochures;
use App\Validators\ResourceValidator;
use Carbon\Carbon;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class NewsRepositoryEloquent
 *
 * @package namespace App\Repositories;
 */
class BrochuresRepositoryEloquent extends BaseRepository implements BrochuresRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Brochures::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return ResourceValidator::class;
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
        $input['active'] = !empty($input['active']) ? 1 : 0;
        $input['is_top'] = !empty($input['is_top']) ? 1 : 0;
        $input['publish_at'] = !empty($input['publish_at']) ? cvDbTime($input['publish_at'], PHP_DATE, DB_DATE) : date("Y-m-d");

        $resource = $this->model->create($input);

        if (!empty($input['metadata'])) {
            $resource->metaCreateOrUpdate($input['metadata']);
        }

        $resource->updateSlugTranslation();

        return $resource;
    }

    public function update(array $input, $id)
    {
        $brochures = $this->model->findOrFail($id);

        $input['active'] = !empty($input['active']) ? 1 : 0;

        $brochures->update($input);

        if (!empty($input['metadata'])) {
            $brochures->metaCreateOrUpdate($input['metadata']);
        }

        $brochures->updateSlugTranslation();

        return $brochures;
    }

    public function delete($id)
    {
        $brochures = $this->model->findOrFail($id);

        $brochures->meta()->delete();

        $brochures->delete();

        return true;
    }

    public function listBrochures($limit = 0)
    {
        $model = $this->model->active()
            ->requiredTranslation()
            ->withTranslation();

        $model = $model->orderBy('created_at', 'desc');
        return $model->paginate($limit);
    }
    
    public function search($q,$limit)
    {
        $model = $this->model->select('*', \DB::raw('"resource" as table_type'))
            ->active()
            ->requiredTranslation()
            ->where(function ($query) use ($q) {
                $query->whereTranslationLike('title', "%$q%")
                    ->orWhereTranslationLike('content', "%$q%");
            })
            ->withTranslation();

        $model->orderBy('created_at', 'desc');

        return $model->paginate($limit);
    }
}
