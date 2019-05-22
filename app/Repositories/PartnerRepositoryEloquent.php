<?php

namespace App\Repositories;

use App\Traits\UploadPhotoTrait;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PartnerRepository;
use App\Models\Partner;
use App\Validators\PartnerValidator;

/**
 * Class GalleryRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PartnerRepositoryEloquent extends BaseRepository implements PartnerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Partner::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return PartnerValidator::class;
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
        $model = $this->model->create($input);
        return $model;
    }

    public function update(array $input, $id)
    {
        $model = $this->model->find($id);
        $model->update($input);
        return $model;
    }

    public function search(array $input = [], $limit = 12)
    {
        $model = $this->model->select('*')
            ->withTranslation()
            ->requiredTranslation('name');

        if (!empty($input['s']) && in_array($input['s'], ['DESC', 'ASC'])) {
            $model->orderByTranslation('name', $input['s']);
        }

        if (!empty($input['k'])) {
            $search_key = trim($input['k']);
            $model->whereTranslationLike('name', '%' . $search_key . '%');
        }

        if (!empty($input['b'])) {
            $model->where('business_id', $input['b']);
        }

        if (!empty($input['c'])) {
            $model->where('country_id', $input['c']);
        }

        return $model->paginate($limit);
    }

    public function partner_frontend()
    {
        $model = $this->model->select('*')
            ->withTranslation()
            ->requiredTranslation('name')
            ->orderBy('position')->get();
        return $model;
    }


}
