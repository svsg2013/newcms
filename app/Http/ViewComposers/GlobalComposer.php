<?php

namespace App\Http\ViewComposers;

use App\Repositories\NewsRepository;
use App\Repositories\PageRepository;
use App\Repositories\PageRepositoryEloquent;
use App\Repositories\PartnerRepository;
use App\Repositories\ProductRepository;
use App\Repositories\NewsCategoryRepository;
use Illuminate\View\View;

class GlobalComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $news;
    protected $page;
    protected $news_category;
    protected $partner;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository $users
     * @return void
     */
    public function __construct(NewsRepository $news, PageRepository $page, NewsCategoryRepository $news_category)
    {
        $this->news = $news;
        $this->page = $page;
        $this->news_category = $news_category;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $locale = \App::getLocale();
        $about_us = \Cache::rememberForever("{$locale}_composer_about_us", function () {
            return $this->page->listPagesByGroupCode('ABOUT-US');
        });

        $news = \Cache::rememberForever("{$locale}_composer_news", function () {
            $model = $this->news->topNews(2,1);
            return $model->toArray();
        });

        $menu = $this->page->listPagesByGroupCode('MENU');

        $view->with('composer_about_us', $about_us);
        $view->with('composer_news', $news);
        $view->with('composer_menu', $menu);
    }
}
