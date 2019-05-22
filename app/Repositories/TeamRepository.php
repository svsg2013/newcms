<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface GalleryRepository
 * @package namespace App\Repositories;
 */
interface TeamRepository extends RepositoryInterface
{
    public function datatable();

    public function getTeamByCategory(int $team_category, int $limit = 5);

    public function getMaster();

    public function getAll($ignore = []);

    public function search(array $input = [], $limit = 12);
}
