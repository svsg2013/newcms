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

    public function datatable(){
        $data = $this->__tag->datatable();
        dd($data);
        return DataTables::of($data)
            ->addColumn(
                'translations',
                function ($data) {
                    return $data->title;
                }
            )
            ->editColumn(
                'active',
                function ($data) {
                    return $data->active ? '<span class="label label-success">'.$data->label_active.'</span>' : '<span class="label label-warning">'.$data->label_active.'</span>';
                }
            )
            ->editColumn(
                'is_top',
                function ($data) {
                    return $data->is_top ? '<i class="material-icons col-pink">check</i>' : '<i class="material-icons">more_horiz</i>';
                }
            )
            ->editColumn(
                'publish_at',
                function ($data) {
                    return $data->publish_at_format;
                }
            )
//            ->addColumn(
//                'action',
//                function ($data) {
//                    return view('admin.layouts.partials.table_button')->with(
//                        [
//                            'link_edit' => route('admin.news.edit', $data->id),
//                            'link_delete' => route('admin.news.destroy', $data->id),
//                            'id_delete' => $data->id
//                        ]
//                    )->render();
//                }
//            )
            ->escapeColumns([])
            ->make(true);
    }
}
