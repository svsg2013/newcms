<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\TranslateUrl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\GalleryRepository;
use App\Repositories\NewsRepository;
use App\Repositories\NewsCategoryRepository;
use App\Models\gallery;
use Breadcrumb;


class GalleryController extends Controller
{
    protected $gallery;
    protected $news;
    protected $category;

    public function __construct(
        GalleryRepository $gallery,
        NewsRepository $news,
        NewsCategoryRepository $category
    )
    {
        $this->gallery = $gallery;
        $this->news = $news;
        $this->category = $category;
    }

    public function photos()
    {
        Breadcrumb::add(trans('menu.library_photo'), null);

        // root
        \Slider::setSlider('COMMUNICATION');
        $slider_news = $this->news->listNews($limit = 5, $is_top = true);
        $news_categories = $this->category->menuCategories();

        $type = Gallery::TYPE_IMAGES;

        $galleries = $this->gallery->galleryByType($type, 7);

        return view('frontend.communicate.photo.index', compact(
            'slider_news',
            'news_categories',
            'galleries'
        ));
    }

    public function showPhoto($slug)
    {
        $gallery = $this->gallery->findBySlug($slug);

        Breadcrumb::add(trans('menu.communicate').trans('menu.library_photo'), route('library_photo.index'));
        Breadcrumb::add($gallery->name, null);

        foreach ($gallery->translations as $translation) {
            TranslateUrl::add($translation->locale, 'routes.library_photo_show', ['slug' => $translation->slug]);
        }

        $other = $this->gallery->otherGallery($gallery->id, $gallery->type, $limit = 8);

        return view('frontend.communicate.photo.show', compact('other', 'gallery'));
    }

    public function videos()
    {
        Breadcrumb::add(trans('menu.video_clip'), null);

        // root
        \Slider::setSlider('COMMUNICATION');
        $slider_news = $this->news->listNews($limit = 5, $is_top = true);
        $news_categories = $this->category->menuCategories();

        $type = Gallery::TYPE_VIDEOS;

        $galleries = $this->gallery->galleryByType($type, 7);

        return view('frontend.communicate.video_clip.index', compact(
            'slider_news',
            'news_categories',
            'galleries'
        ));
    }

    public function showVideo($slug)
    {
        $gallery = $this->gallery->findBySlug($slug);

        Breadcrumb::add(trans('menu.communicate').trans('menu.video_clip'), route('video_clip.index'));
        Breadcrumb::add($gallery->name, null);

        foreach ($gallery->translations as $translation) {
            TranslateUrl::add($translation->locale, 'routes.video_clip_show', ['slug' => $translation->slug]);
        }

        $other = $this->gallery->otherGallery($gallery->id, $gallery->type, $limit = 8);

        return view('frontend.communicate.video_clip.show', compact('other', 'gallery'));
    }
}
