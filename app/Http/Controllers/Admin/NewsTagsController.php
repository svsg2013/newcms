<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
//use App\Repositories\NewsCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Yajra\DataTables\Facades\DataTables;

class NewsTagsController extends Controller
{
    public function index(){
        Breadcrumb::title(trans('admin_news_category.title'));
        return view('admin.news_tag.index');
    }
}
