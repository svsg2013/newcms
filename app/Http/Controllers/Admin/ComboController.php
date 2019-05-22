<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Helper\Breadcrumb;
use App\Http\Controllers\Controller;
use App\Repositories\ComboRepository;
use App\Repositories\DocumentRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Combo;
use App\Models\Document;
use App\Models\LoanIncomeType;

class ComboController extends Controller
{

    protected $combo;
    protected $document;

    public function __construct(ComboRepository $combo, DocumentRepository $document)
    {
        $this->combo = $combo;
        $this->document = $document;
    }

    public function index()
    {
        return view('admin.combo.index');
    }

    public function datatable()
    {
        $data = $this->combo->datatable();

        return DataTables::of($data)
            ->editColumn(
                'active',
                function ($data) {
                    return $data->active ? '<span class="label label-success">'.$data->label_active.'</span>' : '<span class="label label-warning">'.$data->label_active.'</span>';
                }
            )
            ->editColumn(
                'income_type',
                function ($data) {
                    return LoanIncomeType::findOrFail($data->loan_income_type_id)->name;
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                            'link_edit' => route('admin.combo.edit', $data->id),
                            'link_delete' => route('admin.combo.destroy', $data->id),
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
        Breadcrumb::title('Combo');

        $document = $this->document->all();

        $loan_income_type = LoanIncomeType::select('id', 'name')->active()->get();

        return view('admin.combo.create_edit', compact('document', 'loan_income_type'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $this->combo->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => 'Combo']));

        return redirect()->route('admin.combo.index');
    }

    public function edit($id)
    {
        Breadcrumb::title('Edit');

        $combo = $this->combo->find($id);

        $document = $this->document->all();

        $array_document = $combo->documents->pluck('id')->toArray();

        $loan_income_type = LoanIncomeType::select('id', 'name')->active()->get();

        return view('admin.combo.create_edit', compact('combo', 'document', 'array_document', 'loan_income_type'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->combo->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => 'Combo']));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->combo->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => 'Combo']));

        return redirect()->back();
    }
}
