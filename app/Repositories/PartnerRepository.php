<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface GalleryRepository
 * @package namespace App\Repositories;
 */
interface PartnerRepository extends RepositoryInterface
{
    public function datatable();

    public function search(array $input = [], $limit = 12);

    public function partner_frontend();
}
