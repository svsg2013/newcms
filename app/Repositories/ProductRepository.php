<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProductRepository
 *
 * @package namespace App\Repositories;
 */
interface ProductRepository extends RepositoryInterface
{
    public function datatable();

    public function update(array $input, $id);

    public function sortPhoto($positions);

    public function findBySlug($slug);

    public function listProductsOther($id, $type = null);

    public function listProducts();

    public function search(array $input);
}
