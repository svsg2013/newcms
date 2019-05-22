<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BookSpaceRepository.
 *
 * @package namespace App\Repositories;
 */
interface BookSpaceRepository extends RepositoryInterface
{
    public function datatable();

    public function create(array $input);
}
