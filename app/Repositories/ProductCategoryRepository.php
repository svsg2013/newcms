<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProductCategoryRepository
 *
 * @package namespace App\Repositories;
 */
interface ProductCategoryRepository extends RepositoryInterface
{
    public function categoriesByParent($parent_id);

    public function arrTreeCategories($parent_id);

    public function outTreeCategorySortTable($tree);

    public function outTreeCategoryRadioCheckbox($tree, $type = 'radio', $list_id = [], $disable_id = [], $root = false);

    public function store(array $input);

    public function update(array $input, $id);

    public function destroy($id);

    public function allChildrenIds(&$array, $parent_id);

    public function findBySlug($slug, $level = null, $with = []);

    public function sort($positions);

    public function topCategories($limit);

    public function removeCache();

    public function menuCategories();
}
