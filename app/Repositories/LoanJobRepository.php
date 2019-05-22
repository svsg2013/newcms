<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface LoanJobRepository
 * @package namespace App\Repositories;
 */
interface LoanJobRepository extends RepositoryInterface
{
    public function datatable();
}
