<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\BrochuresRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class BrochuresController extends Controller
{
    protected $brochures;

    public function __construct(BrochuresRepository $brochures)
    {
        $this->brochures = $brochures;
    }

    /**
     * Display a listing of the brochures.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Breadcrumb::title(trans('admin_brochures.title'));

        return view('admin.brochures.index');
    }

    public function datatable()
    {
        $data = $this->brochures->datatable();
        return DataTables::of($data)
            ->addColumn(
                'translations',
                function ($data) {
                    return $data->title;
                }
            )
            ->editcolumn(
                'link_download',
                function ($data){
                    return "<a href='$data->link_download' target='_blank'>$data->link_download</a>";
                }
            )
            ->editColumn(
                'active',
                function ($data) {
                    return $data->active ? '<span class="label label-success">'.$data->label_active.'</span>' : '<span class="label label-warning">'.$data->label_active.'</span>';
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                        'link_edit' => route('admin.brochures.edit', $data->id),
                        'link_delete' => route('admin.brochures.destroy', $data->id),
                        'id_delete' => $data->id
                        ]
                    )->render();
                }
            )
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Show the form for creating a new brochures.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Breadcrumb::title(trans('admin_brochures.create'));
        return view('admin.brochures.create_edit');
    }

    /**
     * Store a newly created brochures in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->brochures->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_brochures.brochures')]));

        return redirect()->route('admin.brochures.index');
    }

    /**
     * Display the specified brochures.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified brochures.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Breadcrumb::title(trans('admin_brochures.edit'));

        $brochures = $this->brochures->find($id);

        $metadata = $brochures->meta;

        return view('admin.brochures.create_edit', compact('brochures',  'metadata'));
    }

    /**
     * Update the specified brochures in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->brochures->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_brochures.brochures')]));

        return redirect()->back();
    }

    /**
     * Remove the specified brochures from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->brochures->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_brochures.brochures')]));

        return redirect()->back();
    }
}
