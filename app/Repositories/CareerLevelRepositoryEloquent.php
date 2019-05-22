<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CareerLevelRepository;
use App\Models\CareerLevel;
use App\Validators\CareerLevelValidator;

/**
 * Class CareerLevelRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CareerLevelRepositoryEloquent extends BaseRepository implements CareerLevelRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CareerLevel::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CareerLevelValidator::class;
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
}
