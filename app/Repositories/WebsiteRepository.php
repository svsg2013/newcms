<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface WebsiteRepository
 * @package namespace App\Repositories;
 */
interface WebsiteRepository extends RepositoryInterface
{
    public function datatable();
}
