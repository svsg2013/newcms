<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface NewsRepository
 *
 * @package namespace App\Repositories;
 */
interface CatalogueRepository extends RepositoryInterface
{
    public function datatable();

    public function cataloguesByType($type);

    public function findBySlug($slug);

    public function otherCatalogues($id, $type, $limit = 5);
}
