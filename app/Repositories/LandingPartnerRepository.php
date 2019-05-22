<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface LandingPartnerRepository.
 *
 * @package namespace App\Repositories;
 */
interface LandingPartnerRepository extends RepositoryInterface
{
    public function datatable(array $with = ['template']);
}
