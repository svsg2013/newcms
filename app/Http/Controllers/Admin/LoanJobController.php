<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Helper\Breadcrumb;
use App\Http\Controllers\Controller;
use App\Repositories\LoanJobRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Models\LoanJob;
use App\Models\Combo;

class LoanJobController extends Controller
{

    protected $loan_job;

    public function __construct(LoanJobRepository $loan_job)
    {
        $this->loan_job = $loan_job;
    }

    public function index()
    {
        return view('admin.loan_job.index');
    }

    public function datatable()
    {
        $data = $this->loan_job->datatable();

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
                            'link_edit' => route('admin.loan.job.edit', $data->id),
                            'link_delete' => route('admin.loan.job.destroy', $data->id),
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
        Breadcrumb::title('Loan Job');

        $combo = Combo::select('id', 'name')->get();

        return view('admin.loan_job.create_edit', compact('combo'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $this->loan_job->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => 'Loan Job']));

        return redirect()->route('admin.loan.job.index');
    }

    public function edit($id)
    {
        Breadcrumb::title('Edit');

        $loan_job = $this->loan_job->find($id);

        $combo = Combo::select('id', 'name')->get();

        $array_combo = $loan_job->combos->pluck('id')->toArray();

        return view('admin.loan_job.create_edit', compact('loan_job', 'combo', 'array_combo'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->loan_job->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => 'Loan Job']));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->loan_job->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => 'Loan Job']));

        return redirect()->back();
    }
}
