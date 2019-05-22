<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ElCompanyMenuRepository;
use App\Models\ElCompanyMenu;
use App\Validators\ElCompanyMenuValidator;

/**
 * Class ElCompanyMenuRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ElCompanyMenuRepositoryEloquent extends BaseRepository implements ElCompanyMenuRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ElCompanyMenu::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ElCompanyMenuValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
