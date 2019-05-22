<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CareerApplyRepository
 *
 * @package namespace App\Repositories;
 */
interface CareerApplyRepository extends RepositoryInterface
{
    public function datatable();

    public function store(array $input);

    public function getData(array $input);
}
