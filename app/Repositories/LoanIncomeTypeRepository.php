<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface LoanIncomeTypeRepository
 * @package namespace App\Repositories;
 */
interface LoanIncomeTypeRepository extends RepositoryInterface
{
    public function datatable();
}
