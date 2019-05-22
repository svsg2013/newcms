<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\TranslateUrl;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Repositories\PageRepository;
use App\Repositories\BrochuresRepository;
use Breadcrumb;
use Illuminate\Http\Request;

class BrochuresController extends Controller
{
    protected $resource;
    private $page;

    public function __construct(BrochuresRepository $resource, PageRepository $pageRepository)
    {
        $this->resource = $resource;
        $this->page = $pageRepository;
    }

    public function show($slug)
    {
        $resource = $this->resource->findBySlug($slug);
        Breadcrumb::add(trans('menu.resource'), trans('routes.page_resources'));
        Breadcrumb::add($resource->title, null);

        $page = new Page(['title'=>$resource->title,'slug'=>$resource->slug]);

        $metadata = $resource->meta;
        if (!$metadata || !$metadata->title) {
            $metadata = (object)[
                'title' => $page->title,
                'description' => $page->description,
                'key_word' => '3forcom'
            ];
        }

        // translation url
        $locales = \LaravelLocalization::getSupportedLanguagesKeys();

        foreach ($locales as $key) {
            TranslateUrl::add($key, 'routes.page_resources_show', ['slug' => $resource->{"slug:{$key}"}]);
        }

        $lasted_posts = $this->resource->lastedPosts($resource->id,10);
        $is_sub_page = true;

        return view('frontend.resource.resource-detail', compact(
            'resource',
            'page',
            'metadata',
            'lasted_posts',
            'is_sub_page'
        ));
    }

}
