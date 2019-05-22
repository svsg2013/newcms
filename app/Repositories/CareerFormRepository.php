<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CareerFormRepository.
 *
 * @package namespace App\Repositories;
 */
interface CareerFormRepository extends RepositoryInterface
{
    public function datatable();
}
