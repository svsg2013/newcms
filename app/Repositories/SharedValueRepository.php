<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface SharedValueRepository
 *
 * @package namespace App\Repositories;
 */
interface SharedValueRepository extends RepositoryInterface
{
    public function datatable();

    public function findBySlug($slug);

    public function topSharedValue($limit, $is_top);
}
