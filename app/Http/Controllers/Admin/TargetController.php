<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\TargetRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class TargetController extends Controller
{
    protected $target;

    public function __construct(TargetRepository $target)
    {
        $this->target = $target;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_target.title'));

        return view('admin.target.index');
    }

    public function datatable()
    {
        $data = $this->target->datatable();

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
                        'link_edit' => route('admin.target.edit', $data->id),
                        'link_delete' => route('admin.target.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_target.create'));

        return view('admin.target.create_edit');
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

        $this->target->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_target.target')]));

        return redirect()->route('admin.target.index');
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
        Breadcrumb::title(trans('admin_target.edit'));

        $target = $this->target->find($id);

        return view(
            'admin.target.create_edit',
            compact(
                'target'
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

        $this->target->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_target.target')]));

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
        $this->target->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_target.target')]));

        return redirect()->back();
    }
}
