<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LandingPartnerRepository;
use App\Models\LandingPartner;
use App\Validators\LandingPartnerValidator;

/**
 * Class LandingPartnerRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LandingPartnerRepositoryEloquent extends BaseRepository implements LandingPartnerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LandingPartner::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function datatable(array $with = ['template'])
    {
        return $this->model->withTrashed()->with($with);
    }

    public function restore($id) {
        return $this->model->withTrashed()->find($id)->restore();
    }
    
}
