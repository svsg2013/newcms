<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Models\Address;
use App\Repositories\AddressCategoryRepository;
use App\Repositories\AddressRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Excel;

# Transformers
use League\Fractal\Resource\Collection;

# Requests
use App\Http\Requests\Admin\AddressImportRequest;

class AddressController extends Controller
{
    protected $address;
    protected $address_category;
    protected $manager;
    protected $address_transformer;

    public function __construct(
        AddressRepository $address,
        AddressCategoryRepository $address_category)
    {
        $this->address = $address;
        $this->address_category = $address_category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Breadcrumb::title('Address');

        return view('admin.address.index');
    }

    public function datatable()
    {
        $data = $this->address->datatable();
        return DataTables::of($data)
           ->addColumn(
               'category',
               function ($data) {
                   return $data->category->name;
               }
           )
            ->addColumn(
                'translations',
                function ($data) {
                    return $data->title;
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
                        'link_edit' => route('admin.address.edit', $data->id),
                        'link_delete' => route('admin.address.destroy', $data->id),
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
        Breadcrumb::title('Create Address');

        $categories = $this->address_category->all();

        $city = \App\Models\City::all();

        return view('admin.address.create_edit', compact('categories', 'city'));
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

        $this->address->create($input);

        // Load maps GET_DISBURSEMENTS
        $this->syncJSON('GET_DISBURSEMENTS', 'bank.json');

        // Load maps PAYMENT_METHOD
        $this->syncJSON('PAYMENT_METHOD', 'bank_payment_method.json');

        session()->flash('success', trans('admin_message.created_successful', ['attr' => 'Address']));

        return redirect()->route('admin.address.index');
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
        Breadcrumb::title('Edit Address');

        $address = $this->address->find($id);

        $categories = $this->address_category->all();

        $metadata = $address->meta;

        $city = \App\Models\City::all();

        return view('admin.address.create_edit', compact('address', 'categories', 'metadata', 'city'));
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

        $this->address->update($input, $id);

        // Load maps GET_DISBURSEMENTS
        $this->syncJSON('GET_DISBURSEMENTS', 'bank.json');

        // Load maps PAYMENT_METHOD
        $this->syncJSON('PAYMENT_METHOD', 'bank_payment_method.json');

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => 'Address']));

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
        $this->address->delete($id);

        // Load maps GET_DISBURSEMENTS
        $this->syncJSON('GET_DISBURSEMENTS', 'bank.json');

        // Load maps PAYMENT_METHOD
        $this->syncJSON('PAYMENT_METHOD', 'bank_payment_method.json');

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => 'Address']));

        return redirect()->back();
    }

    private function syncJSON($type, $json_name)
    {
        $locale = \App::getLocale();

        $sql = "select address.id as id, address_translation.name as name, address.lat as lat, address.lng as lng, 	address_category_translation.name as category, city_translation.name as city, address.state_id as state, address.postal as postal, address.phone as phone, address.address as address from `address` 
                
                INNER JOIN address_translation
                ON address.id = address_translation.address_id
                AND address_translation.locale = '{$locale}'

                INNER JOIN city
                ON address.city_id = city.id

                INNER JOIN city_translation
                ON city.id = city_translation.city_id
                AND city_translation.locale = '{$locale}'

                INNER JOIN address_category
                ON address.address_category_id = address_category.id

                INNER JOIN address_category_translation
                ON address_category.id = address_category_translation.address_category_id
                AND address_category_translation.locale = '{$locale}'

                where exists (select id, type from `address_category` where `address`.`address_category_id` = `address_category`.`id` and `address_category`.`type` like '%{$type}%') and `address`.`active` = 1";

        $data = \DB::select($sql);

        \File::put('./assets/locator/'. $json_name, json_encode($data));
    }

    public function import(AddressImportRequest $request)
    {
        $input = $request->all();

        $excel = Excel::load($request->file('file')->getRealPath(), function ($reader) {
        })->get()->toArray();

        if(Excel::load($request->file('file')->getRealPath(), function ($reader) {})->get()[0]->count() > 1) {
            $heading = Excel::load($request->file('file')->getRealPath(), function ($reader) {
            })->get()[0]->getHeading();

            // Check format excel
            if(is_array($heading)) {
                foreach($heading as $key => $value) {
                    if(!in_array($value, $this->arrayExcel())) {
                        session()->flash('error', 'Excel file not formatted!');
                        return redirect()->back();
                    }
                }
            }

            foreach($excel[0] as $key => $value) {
                if($value['name'] == '' 
                    && $value['area'] == ''
                    && $value['city'] == ''
                    && $value['postal'] == ''
                    && $value['phone'] == ''
                    && $value['fax'] == ''
                    && $value['fax'] == '') {
                        unset($excel[0][$key]);
                    }
            }
            
            foreach ($excel as $key => $row) {
                if(!empty($row)) {
                    $import = $this->address->importExcel($row);
                }
            }

        } else {
            session()->flash('error', 'Excel file not formatted!');
            return redirect()->back();
        }
        
        if($import == true) 
            session()->flash('success', 'Successful Import');

        return redirect()->back();
    }

    public function arrayExcel()
    {
        return $array = [
            'name',
            'area',
            'city',
            'postal',
            'phone',
            'fax',
            'address',
            ''
        ];
    }
}
