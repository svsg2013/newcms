<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helper\Breadcrumb;
use App\Models\Branch;
use App\Models\Career;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Image360;
use App\Models\News;
use App\Models\Page;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        Breadcrumb::title(trans('admin_dashboard.dashboard'));
        return view('admin.layouts.master');

        $count_product = Product::count();
        $count_news = News::count();
        $count_career = Career::count();
        $count_branch = Branch::count();
        $count_contact = Contact::count();
        $count_page = Page::count();
        $count_faq = Faq::count();
        $count_slider = Slider::count();
        $count_gallery = Gallery::count();
        $count_image_360 = Image360::count();
        $count_user = User::count();

        return view('admin.dashboard.index', compact(
            'count_product',
            'count_news',
            'count_career',
            'count_branch',
            'count_contact',
            'count_page',
            'count_faq',
            'count_slider',
            'count_gallery',
            'count_image_360',
            'count_user'
        ));
    }
}
