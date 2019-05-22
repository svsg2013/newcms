<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\CareerCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class CareerCategoryController extends Controller
{
    protected $career_category;

    public function __construct(CareerCategoryRepository $career_category)
    {
        $this->career_category = $career_category;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_career_category.title'));

        return view('admin.career_category.index');
    }

    public function datatable()
    {
        $data = $this->career_category->datatable();

        return DataTables::of($data)
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
                        'link_edit' => route('admin.career_category.edit', $data->id),
                        'link_delete' => route('admin.career_category.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_career_category.create'));

        return view('admin.career_category.create_edit');
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

        $this->career_category->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_career_category.career_category')]));

        return redirect()->route('admin.career_category.index');
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
        Breadcrumb::title(trans('admin_career_category.edit'));

        $career_category = $this->career_category->find($id);

        return view(
            'admin.career_category.create_edit',
            compact(
                'career_category'
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

        $this->career_category->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_career_category.career_category')]));

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
        $this->career_category->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_career_category.career_category')]));

        return redirect()->back();
    }
}
