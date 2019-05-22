<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LandingPartnerTemplateRepository;
use App\Models\LandingPartnerTemplate;
use App\Validators\LandingPartnerTemplateValidator;

/**
 * Class LandingPartnerTemplateRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LandingPartnerTemplateRepositoryEloquent extends BaseRepository implements LandingPartnerTemplateRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LandingPartnerTemplate::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
