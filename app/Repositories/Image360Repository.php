<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface Image360Repository
 * @package namespace App\Repositories;
 */
interface Image360Repository extends RepositoryInterface
{
    public function datatable();

    public function store(array $input, $children = false);

    public function update(array $input, $id);

    public function destroy($id, $children = true);

    public function image360();
}
