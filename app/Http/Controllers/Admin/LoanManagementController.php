<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Helper\Breadcrumb;
use App\Http\Controllers\Controller;
use App\Repositories\LoanManagementRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Models\LoanManagement;
use App\Models\LoanJob;
use App\Models\Combo;
use App\Models\City;
use \Carbon\Carbon;
use Excel;

class LoanManagementController extends Controller
{

    protected $loan_management;

    public function __construct(LoanManagementRepository $loan_management)
    {
        $this->loan_management = $loan_management;
    }

    public function index()
    {
        return view('admin.loan_management.index');
    }

    public function datatable(Request $request)
    {
        $input = $request->all();

        $data = $this->loan_management->datatable($input);

        $status_phone_except = $this->loan_management->datatable($input)->where('phone_status', '<>', 1)->get()->count();

        $status_phone_accept = $this->loan_management->datatable($input)->where('phone_status', 1)->get()->count();

        return DataTables::of($data)
            ->editColumn(
                'date',
                function ($data) {
                    return Carbon::parse($data->created_at)->format('d-m-Y');
                }
            )
            ->editColumn(
                'time',
                function ($data) {
                    return Carbon::parse($data->created_at)->format('H:i:s');
                }
            )
            ->editColumn(
                'phone_status',
                function ($data) {
                    return $data->phone_status == 1 ? '<span class="label label-success">Xác nhận</span>' : '<span class="label label-warning">Từ chối</span>';
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                            'link_edit' => route('admin.loan.management.edit', $data->id),
                            'link_delete' => route('admin.loan.management.destroy', $data->id),
                            'id_delete' => $data->id
                        ]
                    )->render();
                }
            )
            ->addColumn('status_phone_accept', function($data) use ($status_phone_accept){
                return $status_phone_accept;
            })
            ->addColumn('status_phone_except', function($data) use ($status_phone_except){
                return $status_phone_except;
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function edit($id)
    {
        Breadcrumb::title('Edit');

        $loan_management = $this->loan_management->find($id);

        $loan_job = LoanJob::select('id', 'name')->active()->get();

        $combo = Combo::select('id', 'name')->active()->get();

        $city = City::all();

        return view('admin.loan_management.create_edit', compact('loan_management', 'loan_job', 'combo', 'city'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->loan_management->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => 'Loan Management']));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->loan_management->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => 'Loan Management']));

        return redirect()->back();
    }

    public function exportExcel(Request $request)
    {
        $input = $request->all();

        $loan_management = $this->loan_management->getData($input);

        $convertDataExcel = $this->convertDataExcel($loan_management);

        Excel::create('Loan_Management', function($excel) use ($convertDataExcel) {
            $excel->sheet('Sheet 1', function($sheet) use ($convertDataExcel) {
                $sheet->fromArray($convertDataExcel);
            });
        })->download('xls');

        session()->flash('success', 'Export Successfully');

        return redirect()->back();
    }

    private function convertDataExcel($data)
    {
        $convertDataExcel = $data->map(function ($item, $key) {
            $item->active       = $item->active == 1 ? 'Active' : 'In-Active';
            $item->status       = $item->active == 0 ? 'Đăng ký ngay' : 'Đặt lịch gọi ngay';
            $item->phone_status = $item->phone_status == 1 ? 'Xác nhận' : 'Từ chối';
            $item->date         = Carbon::parse($item->created_at)->format('d-m-Y');
            $item->time         = Carbon::parse($item->created_at)->format('H:i:s');
            
            return $item;
        });
        
        return collect($convertDataExcel->all());
    }
}
