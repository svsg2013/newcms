<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface LoanSettingRepository
 * @package namespace App\Repositories;
 */
interface LoanSettingRepository extends RepositoryInterface
{
    public function datatable();
}