<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\RfpRepository;
use Breadcrumb;
use Yajra\DataTables\Facades\DataTables;

class RfpController extends Controller
{
    protected $rfp;

    public function __construct(RfpRepository $rfp)
    {
        $this->rfp = $rfp;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_menu.rfp'));
        return view('admin.rfp.index');
    }

    public function datatable()
    {
        $data = $this->rfp->datatable();

        return DataTables::of($data)
            ->editColumn(
                'created_at',
                function ($data) {
                    return cvDbTime($data->created_at, DB_TIME, PHP_DATE_TIME);
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                            'btn_view_datatable' => true,
                            'link_delete' => route('admin.rfp.destroy', $data->id),
                            'id_delete' => $data->id,
                            'link_attachment' => asset("rfp/$data->file_name"),
                        ]
                    )->render();
                }
            )
            ->addColumn('full_name',function ($data){
                return $data->first_name .' '.$data->last_name;
            })
            ->escapeColumns(['first_name','last_name', 'phone', 'email', 'company', 'country', 'solution','requirement_detail'])
            ->make(true);
    }

    public function destroy($id)
    {
        $rfp = $this->rfp->find($id);
        $rfp->delete();

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_menu.rfp')]));

        return redirect()->back();
    }
}
