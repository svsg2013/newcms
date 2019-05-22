<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Helper\Breadcrumb;
use App\Http\Controllers\Controller;
use App\Repositories\LoanIncomeTypeRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Models\LoanIncomeType;

class LoanIncomeTypeController extends Controller
{

    protected $loan_income_type;

    public function __construct(LoanIncomeTypeRepository $loan_income_type)
    {
        $this->loan_income_type = $loan_income_type;
    }

    public function index()
    {
        return view('admin.loan_income_type.index');
    }

    public function datatable()
    {
        $data = $this->loan_income_type->datatable();

        return DataTables::of($data)
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
                            'link_edit' => route('admin.loan.income.type.edit', $data->id),
                            'link_delete' => route('admin.loan.income.type.destroy', $data->id),
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
        Breadcrumb::title('Loan Income Type');

        return view('admin.loan_income_type.create_edit');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $this->loan_income_type->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => 'Loan Income Type']));

        return redirect()->route('admin.loan.income.type.index');
    }

    public function edit($id)
    {
        Breadcrumb::title('Edit');

        $loan_income_type = $this->loan_income_type->find($id);

        return view('admin.loan_income_type.create_edit', compact('loan_income_type'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->loan_income_type->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => 'Loan Income Type']));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->loan_income_type->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => 'Loan Income Type']));

        return redirect()->back();
    }
}
