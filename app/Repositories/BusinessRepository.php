<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface FaqCategoryRepository
 * @package namespace App\Repositories;
 */
interface BusinessRepository extends RepositoryInterface
{
    public function datatable();

    public function listBusiness();
}
