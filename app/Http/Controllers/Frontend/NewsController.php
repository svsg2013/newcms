<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\TranslateUrl;
use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use App\Models\Page;
use App\Models\PageBlock;
use App\Models\Slider;
use App\Repositories\CatalogueRepository;
use App\Repositories\NewsRepository;
use App\Repositories\NewsCategoryRepository;
use App\Repositories\PageRepository;
use Breadcrumb;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $news;
    protected $category;
    protected $catalogue;
    protected $page;

    public function __construct(
        NewsRepository $news,
        NewsCategoryRepository $category,
        CatalogueRepository $catalogue,
        PageRepository $page
    )
    {
        $this->news = $news;
        $this->category = $category;
        $this->catalogue = $catalogue;
        $this->page = $page;
    }

    public function category($slug)
    {
        // root
        Slider::setSlider('COMMUNICATION');

        $baner_top = Slider::$banner;

        Slider::setSlider('NEWS-EVENTS'); //banner-event-bottom

        $events_bottom = Slider::$banner;

        $slider_news = $this->news->listNews($limit = 5, $is_top = true);

        $category = $this->category->findBySlug($slug);

        $news_categories = $this->category->menuCategories();

        Breadcrumb::add($category->name, null);

        $top_news = $this->news->newsByCategory($category->id, 5, null, false);

        // translation
        foreach ($category->translations as $translation) {
            TranslateUrl::add($translation->locale, 'routes.news_category', ['category_slug' => $translation->slug]);
        }

        $ignore = $top_news->pluck('id')->toArray();

        $list = $this->news->newsByCategory($category_id = $category->id, $limit = 8, $ignore, $paging = true);

        return view('frontend.communicate.news.index', compact(
            'news_categories',
            'category',
            'slider_news',
            'top_news',
            'list',
            'slug',
            'baner_top',
            'events_bottom'
        ));
    }

    public function show($slug)
    {
        $news = $this->news->findBySlug($slug);

        $page = new Page(['title' => $news->title, 'slug' => $news->slug]);

        $metadata = $news->meta;
        if (!$metadata || !$metadata->title) {
            $metadata = (object)[
                'title' => $page->title,
                'description' => $page->description,
                'key_word' => 'empirecity'
            ];
        }

        $locales = \LaravelLocalization::getSupportedLanguagesKeys();
        foreach ($locales as $key) {
            TranslateUrl::add($key, 'routes.page_news_detail', ['slug' => $news->{"slug:{$key}"}]);
        }

        $relative_news = $this->news->relative_news($news->id);

        $is_sub_page = true;

        return view('themes.news-detail', compact(
            'news',
            'relative_news',
            'page',
            'is_sub_page'
        ));
    }

    public function getNewsDetail(Request $request, $page_slug, $news_slug)
    {
        $page = $this->page->findBySlug($page_slug);

        $blocks = [];
        if ($page->parentBlocks->count()) {
            $blocks = $page->parentBlocks->groupBy('code');
        }
        $page_block = PageBlock::find($page->id);

        $news = $this->news->findBySlug($news_slug);
        $news_relative = $this->news->relative_news($news);
        return view('themes.join-us-news-tips-detail',compact('page','news','blocks','page_block','news_relative'));
    }
}
