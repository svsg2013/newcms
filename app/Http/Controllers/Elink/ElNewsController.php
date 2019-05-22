<?php

namespace App\Http\Controllers\Elink;

use App\Helper\Breadcrumb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

# Repositories
use App\Repositories\ElNewsRepository;


class ElNewsController extends Controller
{
    protected $el_news;

    public function __construct(ElNewsRepository $el_news)
    {
        $this->el_news = $el_news;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Breadcrumb::title(trans('elink_news.title'));

        return view('elink.news.index');
    }

    

}
