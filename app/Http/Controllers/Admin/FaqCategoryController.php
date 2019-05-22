<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\FaqCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class FaqCategoryController extends Controller
{
    protected $faq_category;

    public function __construct(FaqCategoryRepository $faq_category)
    {
        $this->faq_category = $faq_category;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_faq_category.title'));

        return view('admin.faq_category.index');
    }

    public function datatable()
    {
        $data = $this->faq_category->datatable();

        return DataTables::of($data)
            ->addColumn(
                'translations',
                function ($data) {
                    return $data->name;
                }
            )
            ->editColumn(
                'type',
                function ($data) {
                    return $data->types($data->type);
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                        'link_edit' => route('admin.faq_category.edit', $data->id),
                        'link_delete' => route('admin.faq_category.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_faq_category.create'));

        return view('admin.faq_category.create_edit');
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

        $this->faq_category->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_faq_category.faq_category')]));

        return redirect()->route('admin.faq_category.index');
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
        Breadcrumb::title(trans('admin_faq_category.edit'));

        $faq_category = $this->faq_category->find($id);

        return view(
            'admin.faq_category.create_edit',
            compact(
                'faq_category'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->faq_category->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_faq_category.faq_category')]));

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
        $this->faq_category->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_faq_category.faq_category')]));

        return redirect()->back();
    }
}
