<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BranchRepository
 * @package namespace App\Repositories;
 */
interface BranchRepository extends RepositoryInterface
{
    public function datatable();

    public function store(array $input);

    public function update(array $input, $id);

    public function destroy($id);

    public function branches(array $arr = []);
}
