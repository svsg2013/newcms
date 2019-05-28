<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface NewsRepository
 *
 * @package namespace App\Repositories;
 */
interface NewsTagRepository extends RepositoryInterface
{
//    public function listNews($limit, $is_top);//show in page home

    public function datatable();
//
//    public function findBySlug($slug);
//
//    public function searchNews(array $inputs, $limit = 12);
//
//    public function newsByCategory($category_id, $limit, $ignore = null, $paging = false);
//
//    public function topNews($limit, $is_top);
//
//    public function newsEvent($limit, $is_top);
//
//    public function newsInPage($limit);
//
//    public function relative_news($current_news);
//
//    public function searchNewsPromitions($key);

}
