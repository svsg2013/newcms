<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ElCompanyRepository;
use App\Models\ElCompany;
use App\Validators\ElCompanyValidator;

/**
 * Class ElCompanyRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ElCompanyRepositoryEloquent extends BaseRepository implements ElCompanyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ElCompany::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ElCompanyValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
