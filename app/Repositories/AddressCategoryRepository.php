<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AddressCategoryRepository
 * @package namespace App\Repositories;
 */
interface AddressCategoryRepository extends RepositoryInterface
{
    public function datatable();
    
    public function findBySlug($slug);
}
