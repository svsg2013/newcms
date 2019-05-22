<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CareerDegreeRepository;
use App\Models\CareerDegree;
use App\Validators\CareerDegreeValidator;

/**
 * Class CareerDegreeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CareerDegreeRepositoryEloquent extends BaseRepository implements CareerDegreeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CareerDegree::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CareerDegreeValidator::class;
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
