<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CityCareerRepository
 *
 * @package namespace App\Repositories;
 */
interface CityCareerRepository extends RepositoryInterface
{
    public function datatable();

    public function getCity();
}
