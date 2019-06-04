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

        Breadcrumb::title('Tags');
        return view('admin.news_tag.index');

    }

    public function datatable()
    {

        $data = $this->__tag->datatable();

        return DataTables::of($data)
            ->editColumn(
                'active',
                function ($data) {
                    return $data->active == 1 ? '<span class="label label-success">' . $data->label_active . '</span>' : '<span class="label label-warning">' . $data->label_active . '</span>';
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                            'link_edit' => route('admin.news_tag.edit', $data->id),
                            'link_delete' => route('admin.news_tag.destroy', $data->id),
                            'id_delete' => $data->id
                        ]
                    )->render();
                }
            )
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        Breadcrumb::title('Create Tag');
        return view('admin.news_tag.create_edit');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $this->__tag->create($input);
        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_news_category.news_category')]));
        return redirect()->route('admin.news_tag.index');
    }

    public function edit($id)
    {
        Breadcrumb::title('Edit Tag');
        $news_tags = $this->__tag->find($id);
        return view('admin.news_tag.create_edit', compact('news_tags'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $this->__tag->update($input, $id);
        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_news.news')]));
        return redirect()->route('admin.news_tag.index');
    }

    public function destroy($id){
        $this->__tag->delete($id);
        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_news_category.news_category')]));
        return redirect()->back();
    }
}
