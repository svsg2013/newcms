<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use App\Models\News;

class NewsPromitionsController extends Controller
{
    protected $news_promitions;

    public function __constract(NewsRepository $news_promitions)
    {
        $this->news_promitions = $news_promitions;
    }

    public function show($slug)
    {
        $data = News::whereTranslation('slug', $slug)->where('active', 1)->first();

        if(!empty($data)) {
            return view('frontend.news_promitions.show', compact('data'));
        }

        abort(404);
    }

    public function showNews($slug)
    {
        $data = News::whereTranslation('slug', $slug)->where('active', 1)->first();

        if(!empty($data)) {
            return view('frontend.news.show', compact('data'));
        }

        abort(404);
    }
}
