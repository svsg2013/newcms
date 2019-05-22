<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\CareerFormRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class CareerFormController extends Controller
{
    protected $career_form;

    public function __construct(CareerFormRepository $career_form)
    {
        $this->career_form = $career_form;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_career_form.title'));

        return view('admin.career_form.index');
    }

    public function datatable()
    {
        $data = $this->career_form->datatable();

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
                        'link_edit' => route('admin.career_form.edit', $data->id),
                        'link_delete' => route('admin.career_form.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_career_form.create'));

        return view('admin.career_form.create_edit');
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

        $this->career_form->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_career_form.career_form')]));

        return redirect()->route('admin.career_form.index');
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
        Breadcrumb::title(trans('admin_career_form.edit'));

        $career_form = $this->career_form->find($id);

        return view(
            'admin.career_form.create_edit',
            compact(
                'career_form'
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

        $this->career_form->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_career_form.career_form')]));

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
        $this->career_form->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_career_form.career_form')]));

        return redirect()->back();
    }
}
