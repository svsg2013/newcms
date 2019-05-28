<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NewsTagRepository;
use App\Models\NewsTag;
use App\Models\NewsTagTranslation;

/**
 * Class NewsRepositoryEloquent
 *
 * @package namespace App\Repositories;
 */
class NewsTagRepositoryEloquent extends BaseRepository implements NewsTagRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return NewsTag::class;
    }

    public function datatable()
    {
        return $this->model()->select('*')->withTranslation();
    }
}