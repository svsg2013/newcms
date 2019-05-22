<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CareerCategoryRepository.
 *
 * @package namespace App\Repositories;
 */
interface CareerCategoryRepository extends RepositoryInterface
{
    public function datatable();
}
