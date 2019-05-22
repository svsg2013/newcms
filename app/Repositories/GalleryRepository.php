<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PageRepository
 * @package namespace App\Repositories;
 */
interface GalleryRepository extends RepositoryInterface
{

    public function datatable();

    public function sortPhoto($positions);

    public function galleryByType($type, $limit = 7);

    public function otherGallery($id, $type, $limit = 8);

    public function findBySlug($slug);

}
