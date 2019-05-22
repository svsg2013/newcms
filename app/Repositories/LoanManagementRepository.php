<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface LoanManagementRepository
 * @package namespace App\Repositories;
 */
interface LoanManagementRepository extends RepositoryInterface
{
    public function datatable(array $input);

    public function ApiRequestCreate($token, $data, $inputApi, $inputCheckLead);

    public function getData(array $input);
}
