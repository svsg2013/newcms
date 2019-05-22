<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface FaqQuestionRepository.
 *
 * @package namespace App\Repositories;
 */
interface FaqQuestionRepository extends RepositoryInterface
{
    public function datatable();
}
