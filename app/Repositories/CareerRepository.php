<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CareerRepository
 *
 * @package namespace App\Repositories;
 */
interface CareerRepository extends RepositoryInterface
{
    public function datatable();

    public function search(array $input);

    public function findBySlug($slug);

    public function related($careers);

    public function apply(array $input); //ung tuyen

    public function listCareers($limit = 10, $filter = []);
}
