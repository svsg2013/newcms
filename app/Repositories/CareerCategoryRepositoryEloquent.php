<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CareerCategoryRepository;
use App\Models\CareerCategory;
use App\Validators\CareerCategoryValidator;

/**
 * Class CareerCategoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CareerCategoryRepositoryEloquent extends BaseRepository implements CareerCategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CareerCategory::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CareerCategoryValidator::class;
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

    public function listCareerCategory()
    {
        return $this->model->select('*')
            ->withTranslation()
            ->orderBy('position', 'asc')
            ->get();
    }
}
