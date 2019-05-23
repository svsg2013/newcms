<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NewsTagRepository;
use App\Models\News;
use App\Validators\NewsValidator;

/**
 * Class NewsRepositoryEloquent
 *
 * @package namespace App\Repositories;
 */
class NewsTagRepositoryEloquent extends BaseRepository implements NewsTagRepository
{

}