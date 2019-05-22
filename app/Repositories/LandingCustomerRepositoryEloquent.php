<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LandingCustomerRepository;
use App\Models\LandingCustomer;
use App\Validators\LandingCustomerValidator;

/**
 * Class LandingCustomerRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LandingCustomerRepositoryEloquent extends BaseRepository implements LandingCustomerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LandingCustomer::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function datatable(array $with = ['partner'])
    {
        return $this->model->select('*')->with($with);
    }
    
}
