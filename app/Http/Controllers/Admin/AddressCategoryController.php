<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\AddressCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class AddressCategoryController extends Controller
{
    protected $address_category;

    public function __construct(AddressCategoryRepository $address_category)
    {
        $this->address_category = $address_category;
    }

    public function index()
    {
        Breadcrumb::title('Address Category');
        return view('admin.address_category.index');
    }

    public function datatable()
    {
        $data = $this->address_category->datatable();

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
                            'link_edit' => route('admin.address.category.edit', $data->id),
                            'link_delete' => route('admin.address.category.destroy', $data->id),
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
        Breadcrumb::title('Create Address Category');

        return view('admin.address_category.create_edit');
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

        $this->address_category->create($input);

        // Load maps GET_DISBURSEMENTS
        $this->syncJSON('GET_DISBURSEMENTS', 'bank.json');

        // Load maps PAYMENT_METHOD
        $this->syncJSON('PAYMENT_METHOD', 'bank_payment_method.json');

        session()->flash('success', trans('admin_message.created_successful', ['attr' => 'Address Category']));

        return redirect()->route('admin.address.category.index');
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
        Breadcrumb::title('Edit Address Category');

        $address_category = $this->address_category->find($id);

        return view(
            'admin.address_category.create_edit',
            compact(
                'address_category'
            )
        );
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

        $this->address_category->update($input, $id);

        // Load maps GET_DISBURSEMENTS
        $this->syncJSON('GET_DISBURSEMENTS', 'bank.json');

        // Load maps PAYMENT_METHOD
        $this->syncJSON('PAYMENT_METHOD', 'bank_payment_method.json');

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => 'Address Category']));

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
        $this->address_category->delete($id);

        // Load maps GET_DISBURSEMENTS
        $this->syncJSON('GET_DISBURSEMENTS', 'bank.json');

        // Load maps PAYMENT_METHOD
        $this->syncJSON('PAYMENT_METHOD', 'bank_payment_method.json');

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => 'Address Category']));

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
}
