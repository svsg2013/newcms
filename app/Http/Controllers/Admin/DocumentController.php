<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Helper\Breadcrumb;
use App\Http\Controllers\Controller;
use App\Repositories\DocumentRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Document;

class DocumentController extends Controller
{

    protected $document;

    public function __construct(DocumentRepository $document)
    {
        $this->document = $document;
    }

    public function index()
    {
        return view('admin.document.index');
    }

    public function datatable()
    {
        $data = $this->document->datatable();

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
                            'link_edit' => route('admin.document.edit', $data->id),
                            'link_delete' => route('admin.document.destroy', $data->id),
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
        Breadcrumb::title('Document');

        return view('admin.document.create_edit');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $this->document->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => 'Document']));

        return redirect()->route('admin.document.index');
    }

    public function edit($id)
    {
        Breadcrumb::title('Edit');

        $document = $this->document->find($id);

        return view('admin.document.create_edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->document->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => 'Document']));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->document->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => 'Document']));

        return redirect()->back();
    }
}
