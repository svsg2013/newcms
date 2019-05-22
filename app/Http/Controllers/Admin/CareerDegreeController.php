<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\CareerDegreeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class CareerDegreeController extends Controller
{
    protected $career_degree;

    public function __construct(CareerDegreeRepository $career_degree)
    {
        $this->career_degree = $career_degree;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_career_degree.title'));

        return view('admin.career_degree.index');
    }

    public function datatable()
    {
        $data = $this->career_degree->datatable();

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
                        'link_edit' => route('admin.career_degree.edit', $data->id),
                        'link_delete' => route('admin.career_degree.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_career_degree.create'));

        return view('admin.career_degree.create_edit');
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

        $this->career_degree->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_career_degree.career_degree')]));

        return redirect()->route('admin.career_degree.index');
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
        Breadcrumb::title(trans('admin_career_degree.edit'));

        $career_degree = $this->career_degree->find($id);

        return view(
            'admin.career_degree.create_edit',
            compact(
                'career_degree'
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

        $this->career_degree->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_career_degree.career_degree')]));

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
        $this->career_degree->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_career_degree.career_degree')]));

        return redirect()->back();
    }
}
