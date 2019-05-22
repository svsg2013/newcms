<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\Image360Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class Image360Controller extends Controller
{
    protected $image360;

    public function __construct(Image360Repository $image360)
    {
        $this->image360 = $image360;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Breadcrumb::title(trans('admin_image360.title'));

        return view('admin.image360.index');
    }

    public function datatable()
    {
        $data = $this->image360->datatable();
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
                        'link_edit' => route('admin.image360.edit', $data->id),
                        'link_delete' => route('admin.image360.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_image360.create'));

        return view('admin.image360.create_edit');
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

        $this->image360->store($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_image360.image360')]));

        return redirect()->route('admin.image360.index');
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
        Breadcrumb::title(trans('admin_image360.edit'));

        $image360 = $this->image360->find($id);

        return view('admin.image360.create_edit', compact('image360'));
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

        $this->image360->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_image360.image360')]));

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
        $this->image360->destroy($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_image360.image360')]));

        return redirect()->back();
    }
}
