<?php

namespace App\Repositories;

use App\Models\AddressCategory;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class AddressCategoryRepositoryEloquent
 * @package namespace App\Repositories;
 */
class AddressCategoryRepositoryEloquent extends BaseRepository implements AddressCategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AddressCategory::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        //
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
        if(!empty($input['type'])) {
            $input['type'] = $input['type'];
        } else {
            $input['type'] = [];
        }

        $input['type'] = json_encode($input['type']);
        
        $model = $this->model->create($input);
        $model->updateSlugTranslation();
        return $model;
    }

    public function update(array $input, $id)
    {
        if(!empty($input['type'])) {
            $input['type'] = $input['type'];
        } else {
            $input['type'] = [];
        }

        $input['type'] = json_encode($input['type']);

        $model = $this->model->find($id);
        $model->update($input);
        $model->updateSlugTranslation();
        return $model;
    }

    public function findBySlug($slug)
    {
        $locale = \App::getLocale();
        return $this->model
            ->whereTranslation('slug', $slug, $locale)
            ->with('translations')
            ->firstOrFail();
    }
}
