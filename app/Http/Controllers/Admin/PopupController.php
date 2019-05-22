<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\PopupRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PopupController extends Controller
{
    protected $popup;

    public function __construct(
        PopupRepository $popup
    )
    {
        $this->popup = $popup;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Breadcrumb::title(trans('admin_popup.title'));

        return view('admin.popup.index');
    }

    public function datatable()
    {
        $data = $this->popup->datatable();
        return DataTables::of($data)
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                            'link_edit' => route('admin.popup.edit', $data->id),
                            'link_delete' => route('admin.popup.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_popup.create'));

        return view('admin.popup.create_edit');
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

        $this->popup->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_popup.popup')]));
        
        return redirect()->route('admin.popup.index');
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
        Breadcrumb::title(trans('admin_popup.edit'));

        $popup = $this->popup->find($id);

        return view('admin.popup.create_edit', compact('popup'));
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

        $this->popup->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_popup.popup')]));
        
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
        $this->popup->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_popup.popup')]));

        return redirect()->back();
    }
}
