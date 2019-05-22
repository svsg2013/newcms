<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;


use App\Repositories\CityRepository;

class CityController extends Controller
{

    protected $city;

    public function __construct(CityRepository $city)
    {
        $this->city = $city;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Breadcrumb::title(trans('admin_career.title'));

        return view('admin.city.index');
    }

    public function datatable()
    {
        $data = $this->city->datatable();

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
                        'link_edit' => route('admin.city.edit', $data->id),
                        'link_delete' => route('admin.city.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_city.create'));

        return view('admin.city.create_edit');
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

        $this->city->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_city.city')]));

        return redirect()->route('admin.city.index');
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
        Breadcrumb::title(trans('admin_city.edit'));

        $city = $this->city->find($id);

        return view('admin.city.create_edit', compact('city'));
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

        $this->city->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_city.city')]));

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
        $this->city->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_city.city')]));

        return redirect()->back();
    }
}
