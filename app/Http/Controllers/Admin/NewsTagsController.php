<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\NewsTagRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class NewsTagsController extends Controller
{
    protected $__tag;

    public function __construct(NewsTagRepository $newsTagRepository)
    {
        $this->__tag = $newsTagRepository;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_news_category.title'));
        return view('admin.news_tag.index');
    }
}
