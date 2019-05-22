<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\NewsCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class NewsCategoryController extends Controller
{
    protected $news_category;

    public function __construct(NewsCategoryRepository $news_category)
    {
        $this->news_category = $news_category;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_news_category.title'));
        return view('admin.news_category.index');
    }

    public function datatable()
    {
        $data = $this->news_category->datatable();

        return DataTables::of($data)
            ->addColumn(
                'code',
                function ($data) {
                    return trans('admin_news_category.form.news_page_type.'.$data->code);
                }
            )
            ->addColumn(
                'translations',
                function ($data) {
                    return $data->name;
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                            'link_edit' => route('admin.news_category.edit', $data->id),
                            'link_delete' => route('admin.news_category.destroy', $data->id),
                            'id_delete' => $data->id
                        ]
                    )->render();
                }
            )
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Breadcrumb::title(trans('admin_news_category.create'));

        $news_page_type = config('constants.news_page_type');

        //parent category
        $parent_news_categories = $this->news_category->getParentCategories();

        return view('admin.news_category.create_edit', compact(
            'news_page_type',
            'parent_news_categories'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->news_category->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_news_category.news_category')]));

        return redirect()->route('admin.news_category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Breadcrumb::title(trans('admin_news_category.edit'));

        $news_category = $this->news_category->find($id);

        $news_page_type = config('constants.news_page_type');

        //parent category
        $parent_news_categories = $this->news_category->getParentCategories();
        //dd($news_category->toArray());
        return view(
            'admin.news_category.create_edit',
            compact(
                'news_category',
                'news_page_type',
                'parent_news_categories'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->news_category->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_news_category.news_category')]));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->news_category->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_news_category.news_category')]));

        return redirect()->back();
    }

    public function getCategoryByCode($code){
        return $code;
        return '123123123123123';
    }
}
