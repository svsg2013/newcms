<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ElNewsRepository
 *
 * @package namespace App\Repositories;
 */
interface ElNewsRepository extends RepositoryInterface
{
    public function listElNews($limit, $is_top); //show in page home

    public function datatable();

    public function topElNews($limit, $is_top);

}
