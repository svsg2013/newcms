<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\PartnerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\BusinessRepository;
use App\Repositories\CountryRepository;

class PartnerController extends Controller
{
    protected $partner;
    protected $business;
    protected $country;

    public function __construct(
        PartnerRepository $partner, 
        BusinessRepository $business,
        CountryRepository $country
    )
    {
        $this->partner = $partner;
        $this->business = $business;
        $this->country = $country;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Breadcrumb::title(trans('admin_partner.title'));

        return view('admin.partner.index');
    }

    public function datatable()
    {
        $data = $this->partner->datatable();
        return DataTables::of($data)
            ->editColumn('logo', function ($data) {
                return $data->logo ? '<img height="70" src="'. $data->logo .'" />' : '---';
            })
            ->addColumn('bussiness', function($data){
                return trans('admin_partner.table.bussiness_'.$data->business_id);
            })
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
                            'link_edit' => route('admin.partner.edit', $data->id),
                            'link_delete' => route('admin.partner.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_partner.create'));

        $business = $this->business->listBusiness();

        $country = $this->country->listCountry();

        return view('admin.partner.create_edit', compact('business','country'));
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

        $this->partner->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_partner.partner')]));
        Cache::clear();
        return redirect()->route('admin.partner.index');
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
        Breadcrumb::title(trans('admin_partner.edit'));

        $partner = $this->partner->find($id);

        $business = $this->business->all();

        $country = $this->country->all();

        return view('admin.partner.create_edit', compact('partner', 'business', 'country'));
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

        $this->partner->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_partner.partner')]));
        Cache::clear();
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
        $this->partner->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_partner.partner')]));

        return redirect()->back();
    }
}
