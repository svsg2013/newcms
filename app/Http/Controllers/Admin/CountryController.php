<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\CountryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends Controller
{
    protected $country;

    public function __construct(CountryRepository $country)
    {
        $this->country = $country;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_country.title'));

        return view('admin.country.index');
    }

    public function datatable()
    {
        $data = $this->country->datatable();

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
                        'link_edit' => route('admin.country.edit', $data->id),
                        'link_delete' => route('admin.country.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_country.create'));

        return view('admin.country.create_edit');
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

        $this->country->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_country.country')]));

        return redirect()->route('admin.country.index');
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
        Breadcrumb::title(trans('admin_country.edit'));

        $country = $this->country->find($id);

        return view(
            'admin.country.create_edit',
            compact(
                'country'
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

        $this->country->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_country.country')]));

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
        $this->country->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_country.country')]));

        return redirect()->back();
    }
}
