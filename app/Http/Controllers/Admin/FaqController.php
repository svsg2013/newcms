<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\FaqRepository;
use App\Repositories\FaqCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    protected $faq;
    protected $faq_category;

    public function __construct(FaqRepository $faq, FaqCategoryRepository $faq_category)
    {
        $this->faq = $faq;
        $this->faq_category = $faq_category;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_faq.title'));

        return view('admin.faq.index');
    }

    public function datatable()
    {
        $data = $this->faq->datatable();

        return DataTables::of($data)
            ->addColumn(
                'translations',
                function ($data) {
                    return $data->question;
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                        'link_edit' => route('admin.faq.edit', $data->id),
                        'link_delete' => route('admin.faq.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_faq.create'));

        $categories = $this->faq_category->all();

        return view('admin.faq.create_edit', compact(
            'categories'
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

        $this->faq->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_faq.faq')]));

        return redirect()->route('admin.faq.index');
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
        Breadcrumb::title(trans('admin_faq.edit'));

        $faq = $this->faq->find($id);

        $categories = $this->faq_category->all();

        return view('admin.faq.create_edit', compact(
            'faq',
            'categories'
        ));
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

        $this->faq->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_faq.faq')]));

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
        $this->faq->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_faq.faq')]));

        return redirect()->back();
    }
}
