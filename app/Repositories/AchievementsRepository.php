<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AchievementsRepository
 *
 * @package namespace App\Repositories;
 */
interface AchievementsRepository extends RepositoryInterface
{
    public function datatable();

    public function findBySlug($slug);

    public function topAchievements($limit, $is_top);
}
