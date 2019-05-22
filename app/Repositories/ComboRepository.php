<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ComboRepository
 * @package namespace App\Repositories;
 */
interface ComboRepository extends RepositoryInterface
{
    public function datatable();
}
