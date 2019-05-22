<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\CareerLevelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class CareerLevelController extends Controller
{
    protected $career_level;

    public function __construct(CareerLevelRepository $career_level)
    {
        $this->career_level = $career_level;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_career_level.title'));

        return view('admin.career_level.index');
    }

    public function datatable()
    {
        $data = $this->career_level->datatable();

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
                        'link_edit' => route('admin.career_level.edit', $data->id),
                        'link_delete' => route('admin.career_level.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_career_level.create'));

        return view('admin.career_level.create_edit');
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

        $this->career_level->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_career_level.career_level')]));

        return redirect()->route('admin.career_level.index');
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
        Breadcrumb::title(trans('admin_career_level.edit'));

        $career_level = $this->career_level->find($id);

        return view(
            'admin.career_level.create_edit',
            compact(
                'career_level'
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

        $this->career_level->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_career_level.career_level')]));

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
        $this->career_level->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_career_level.career_level')]));

        return redirect()->back();
    }
}
