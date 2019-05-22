<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface NewsRepository
 *
 * @package namespace App\Repositories;
 */
interface BrochuresRepository extends RepositoryInterface
{
    public function listBrochures($limit);//filter in frontend page

    public function datatable();

    public function search($q, $limit);
}
