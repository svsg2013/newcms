<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LandingTemplateRepository;
use App\Models\LandingTemplate;
use App\Validators\LandingTemplateValidator;

/**
 * Class LandingTemplateRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LandingTemplateRepositoryEloquent extends BaseRepository implements LandingTemplateRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LandingTemplate::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
