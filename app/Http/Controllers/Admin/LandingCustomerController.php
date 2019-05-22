<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Models\LandingCareer;
use App\Models\LandingCustomer;
use App\Models\LandingDistrict;
use App\Models\LandingLoan;
use App\Models\LandingPartner;
use App\Models\LandingTemplate;
use App\Repositories\LandingCustomerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class LandingCustomerController extends Controller
{
    protected $landingCustomerRepository;

    public function __construct(
        LandingCustomerRepository $landingCustomerRepository
    )
    {
        $this->landingCustomerRepository = $landingCustomerRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Breadcrumb::title(trans('admin_landing_customer.title'));
        $partners = LandingPartner::get();
        return view('admin.landing_customer.index', compact(
            'partners'
        ));
    }

    public function datatable()
    {

        $status_phone_except = $this->landingCustomerRepository->datatable()->where('phone_status', '<>', 1)->count();
        $status_phone_accept = $this->landingCustomerRepository->datatable()->where('phone_status', 1)->count();

        $builder = $this->landingCustomerRepository->datatable();

        if (request()->query('partner_code')) {
            $builder->where('partner_code', request()->query('partner_code'));
        }

        if (request()->query('date_created_start')) {
            $date_from = Carbon::createFromFormat('d-m-Y', request()->query('date_created_start'))->format(DB_DATE);
            $builder->whereDate('created_at', '>=', $date_from);
        }
        if (request()->query('date_created_end')) {
            $date_to = Carbon::createFromFormat('d-m-Y', request()->query('date_created_end'))->format(DB_DATE);
            $builder->whereDate('created_at', '<=', $date_to);
        }

        if (request()->query('full_name')) {
            $builder->where('fullname', request()->query('full_name'));
        }

        if (request()->query('email')) {
            $builder->where('email', request()->query('email'));
        }

        if (request()->query('phone_number')) {
            $builder->where('phonenumber', request()->query('phone_number'));
        }

        if (request()->query('status')) {
            $builder->where('status', request()->query('status'));
        }

        if (request()->query('phone_status')) {
            $builder->where('phone_status', request()->query('phone_status'));
        }

        $dataTables = datatables($builder);
        $dataTables->editColumn(
            'partner_name',
            function ($data) {
                return $data->partner->name ?? '';
            }
        );
        $dataTables->addColumn(
            'action',
            function ($data) {
                return view('admin.layouts.partials.table_button')->with(
                    [
                        'link_edit' => route('admin.landing_customer.edit', $data->id),
                        'link_delete' => route('admin.landing_customer.destroy', $data->id),
                        'id_delete' => $data->id
                    ]
                )->render();
            }
        );
        $dataTables->addColumn('status_phone_accept', function($data) use ($status_phone_accept){
            return $status_phone_accept;
        });
        $dataTables->addColumn('status_phone_except', function($data) use ($status_phone_except){
            return $status_phone_except;
        });

        $dataTables->editColumn(
            'date',
            function ($data) {
                return Carbon::parse($data->created_at)->format('d-m-Y');
            }
        );
        $dataTables->editColumn(
            'time',
            function ($data) {
                return Carbon::parse($data->created_at)->format('H:i:s');
            }
        );
        $dataTables->editColumn(
            'phone_status',
            function ($data) {
                return $data->phone_status == 1 ? '<span class="label label-success">Xác nhận</span>' : '<span class="label label-warning">Từ chối</span>';
            }
        );


        $dataTables->escapeColumns([]);
        return $dataTables->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
        Breadcrumb::title(trans('admin_landing_customer.create'));

        $templates = LandingTemplate::all();

        return view('admin.landing_customer.create_edit', compact('templates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort(404);
        $request->validate([
            'campaign_source' => [
                'required',
                'string',
                'regex:/(^([a-zA-Z0-9-_]+)?$)/u',
                Rule::unique((new LandingCustomer())->getTable())
            ],
            'email' => [
                'required',
                'string',
                Rule::unique((new LandingCustomer())->getTable())
            ],
            'template_code' => [
                'nullable',
                Rule::exists((new LandingTemplate())->getTable(), 'code')
            ]
        ]);
        $input = $request->all();
        $input['password'] = str_random(6);

        $this->landingCustomerRepository->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_landing_customer.title')]));
        return redirect()->route('admin.landing_customer.index');
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
//        abort(404);
        Breadcrumb::title(trans('admin_landing_customer.edit'));

        $data = $this->landingCustomerRepository->find($id);
        $districts = LandingDistrict::all();
        $careers = LandingCareer::all();
        $loans = LandingLoan::all();
        return view('admin.landing_customer.create_edit', compact(
            'data',
            'careers',
            'districts',
            'loans'
        ));
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
        $request->validate([
            'fullname' => [
                'required'
            ],
            'email' => [
                'nullable',
                'string',
                Rule::unique((new LandingCustomer())->getTable())->ignore($id)
            ],
            'loan_id' => [
                'nullable',
                Rule::exists((new LandingLoan())->getTable(), 'id')
            ],
            'career_id' => [
                'nullable',
                Rule::exists((new LandingCareer())->getTable(), 'id')
            ],
            'district_id' => [
                'nullable',
                Rule::exists((new LandingDistrict())->getTable(), 'id')
            ]
        ]);
        $input = $request->all();
        $input['loan_amount'] = convertStringToNumber($input['loan_amount']);

        $input['monthly_payment'] = convertStringToNumber($input['monthly_payment']);
        if (!array_key_exists('active', $input)) {
            $input['active'] = 0;
        }
        $this->landingCustomerRepository->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_landing_customer.title')]));
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
        $this->landingCustomerRepository->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_landing_customer.title')]));

        return redirect()->back();
    }

    public function export(Request $request)
    {
        $customersBuilder = $this->landingCustomerRepository->datatable();

        if ($request->input('date_from')) {
            $date_from = Carbon::createFromFormat('d-m-Y', $request->input('date_from'))->format(DB_DATE);
            $customersBuilder->whereDate('created_at', '>=', $date_from);
        }
        if ($request->input('date_to')) {
            $date_to = Carbon::createFromFormat('d-m-Y', $request->input('date_to'))->format(DB_DATE);
            $customersBuilder->whereDate('created_at', '<=', $date_to);
        }

        $customers = $customersBuilder->get();

        $convertDataExcel = $this->convertDataExcel($customers);

        $response = Excel::create('Landing_Customer', function($excel) use ($convertDataExcel) {
            $excel->sheet('Sheet 1', function($sheet) use ($convertDataExcel) {
                $sheet->fromArray($convertDataExcel);
//                $sheet->setFontBold(true);
                $sheet->row(1, function($row) {
                    // call cell manipulation methods
                    $row->setFontWeight('bold');

                });
            });
        })->download('xlsx');

        session()->flash('success', 'Export Successfully');

        return $response;
    }

    private function convertDataExcel($data)
    {
        $convertDataExcel = $data->map(function ($item, $key) {
            $arr = $item->toArray();
            unset($arr['url']);
            unset($arr['partner']);
            unset($arr['created_at']);
            unset($arr['updated_at']);
            return array_merge($arr, [
                'active'       => $item->active == 1 ? 'Active' : 'In-Active',
                'status'       => $item->active == 0 ? 'Đăng ký ngay' : 'Đặt lịch gọi ngay',
                'phone_status' => $item->phone_status == 1 ? 'Xác nhận' : 'Từ chối',
                'date'         => Carbon::parse($item->created_at)->format('d-m-Y'),
                'time'         => Carbon::parse($item->created_at)->format('H:i:s'),
            ]);
        });

        return collect($convertDataExcel->all());
    }
}
