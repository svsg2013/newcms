<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\BusinessRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class BusinessController extends Controller
{
    protected $business;

    public function __construct(BusinessRepository $business)
    {
        $this->business = $business;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_business.title'));

        return view('admin.business.index');
    }

    public function datatable()
    {
        $data = $this->business->datatable();

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
                        'link_edit' => route('admin.business.edit', $data->id),
                        'link_delete' => route('admin.business.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_business.create'));

        return view('admin.business.create_edit');
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

        $this->business->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_business.business')]));

        return redirect()->route('admin.business.index');
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
        Breadcrumb::title(trans('admin_business.edit'));

        $business = $this->business->find($id);

        return view(
            'admin.business.create_edit',
            compact(
                'business'
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

        $this->business->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_business.business')]));

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
        $this->business->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_business.business')]));

        return redirect()->back();
    }
}
