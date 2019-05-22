<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface LandingCustomerRepository.
 *
 * @package namespace App\Repositories;
 */
interface LandingCustomerRepository extends RepositoryInterface
{
    public function datatable(array $with = ['partner']);
}
