<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Helper\Breadcrumb;
use App\Http\Controllers\Controller;
use App\Repositories\LoanSettingRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Models\LoanSetting;
use App\Models\LoanJob;
use App\Models\LoanIncomeType;

class LoanSettingController extends Controller
{

    protected $loan_setting;

    public function __construct(LoanSettingRepository $loan_setting)
    {
        $this->loan_setting = $loan_setting;
    }

    public function index()
    {
        return view('admin.loan_setting.index');
    }

    public function datatable()
    {
        $data = $this->loan_setting->datatable();

        return DataTables::of($data)
            ->editColumn('loan_job_id', function($data) {
                $data_job_id = $data->loanGenerals->pluck('loan_job_id')->toArray();
                if(count($data_job_id)) {
                    $name_job = '';
                    foreach($data_job_id as $key) {
                        $name_job .= LoanJob::find($key)->name . ' ';
                    }
                }
                return $name_job;
            })
            ->editColumn('loan_income_type', function($data) {
                $data_income_type = $data->loanGenerals->pluck('loan_income_type_id')->toArray();
                if(count($data_income_type)) {
                    $name_income_type = '';
                    foreach($data_income_type as $key) {
                        $name_income_type .= LoanIncomeType::find($key)->name . ' ';
                    }
                }
                return $name_income_type;
            })
            ->editColumn('min_money', function($data) {
                return number_format($data->min_money);
            })
            ->editColumn('max_money', function($data) {
                return number_format($data->max_money);
            })
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                            'link_edit' => route('admin.loan.setting.edit', $data->id),
                            'link_delete' => route('admin.loan.setting.destroy', $data->id),
                            'id_delete' => $data->id
                        ]
                    )->render();
                }
            )
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        Breadcrumb::title('Loan Setting');

        $loan_job = LoanJob::select('id', 'name')->active()->get();

        $loan_income_type = LoanIncomeType::select('id', 'name')->active()->get();

        return view('admin.loan_setting.create_edit', compact('loan_job', 'loan_income_type'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $this->loan_setting->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => 'Loan Setting']));

        return redirect()->route('admin.loan.setting.index');
    }

    public function edit($id)
    {
        Breadcrumb::title('Edit');

        $loan_setting = $this->loan_setting->find($id);

        $loan_job = LoanJob::select('id', 'name')->active()->get();

        $loan_income_type = LoanIncomeType::select('id', 'name')->active()->get();

        $array_loan_job_id = $loan_setting->loanGenerals->pluck('loan_job_id')->toArray();

        $array_loan_income_type_id = $loan_setting->loanGenerals->pluck('loan_income_type_id')->toArray();

        return view('admin.loan_setting.create_edit', compact('loan_setting', 'loan_job', 'loan_income_type', 'array_loan_job_id', 'array_loan_income_type_id'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->loan_setting->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => 'Loan Setting']));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->loan_setting->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => 'Loan Setting']));

        return redirect()->back();
    }
}
