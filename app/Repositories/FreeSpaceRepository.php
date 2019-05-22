<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProductCategoryRepository
 *
 * @package namespace App\Repositories;
 */
interface FreeSpaceRepository extends RepositoryInterface
{
    public function byParent($parent_id);

    public function arrTree($parent_id);

    public function allChildrenIds(&$array, $parent_id);

    public function sort($positions);
}
