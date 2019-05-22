<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MenuTranslationRepository;
use App\Models\MenuTranslation;
use App\Validators\MenuTranslationValidator;

/**
 * Class MenuTranslationRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MenuTranslationRepositoryEloquent extends BaseRepository implements MenuTranslationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MenuTranslation::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
