<?php

namespace App\Http\Controllers\Elink;

use App\Helper\Breadcrumb;
use App\Repositories\FaqRepository;
use App\Repositories\FaqCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ElFaqsController extends Controller
{
    protected $faq;

    public function __construct(FaqRepository $faq, FaqCategoryRepository $faq_category)
    {
        $this->faq = $faq;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_faq.title'));
        return view('elink.faqs.index');
    } 
}
