<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AddressRepository
 *
 * @package namespace App\Repositories;
 */
interface AddressRepository extends RepositoryInterface
{
    public function datatable();

    public function findBySlug($slug);

    public function importExcel(array $input);
}
