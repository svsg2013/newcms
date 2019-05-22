<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RfpRepository;
use App\Models\Rfp;
use App\Validators\RfpValidator;

/**
 * Class RfpRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RfpRepositoryEloquent extends BaseRepository implements RfpRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Rfp::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return RfpValidator::class;
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
        return $this->model->select('*')->orderBy('created_at', 'desc');
    }
    
}
