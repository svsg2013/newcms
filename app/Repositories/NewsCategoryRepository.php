<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface FaqCategoryRepository
 * @package namespace App\Repositories;
 */
interface NewsCategoryRepository extends RepositoryInterface
{
    public function datatable();

    public function menuCategories();

    public function findBySlug($slug);

    public function findCategoryByCode($code);

    public function getParentCategories();

    public function getChildParent();

}
