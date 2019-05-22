<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CareerDegreeRepository.
 *
 * @package namespace App\Repositories;
 */
interface CareerDegreeRepository extends RepositoryInterface
{
    public function datatable();
}
