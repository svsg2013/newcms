<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\SubscribeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Breadcrumb;
use Yajra\DataTables\Facades\DataTables;
use Excel;

class SubscribeController extends Controller
{
    protected $subscribe;

    public function __construct(SubscribeRepository $subscribe)
    {
        $this->subscribe = $subscribe;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_subscribe.title'));
        return view('admin.subscribe.index');
    }

    public function datatable()
    {
        $data = $this->subscribe->datatable();

        return DataTables::of($data)
            ->editColumn(
                'active',
                function ($data) {
                    $checked = !empty($data) && $data->active ? "checked" : "";
                    return '<input type="checkbox" id="active_'. $data->id .'" name="active_'. $data->id .'" class="active-subscribe" data-id="'. $data->id .'" value="'. $data->active .'" '. $checked .'>
                            <label for="active_'. $data->id .'" class="label-subscribe">Active</label>';
                }
            )
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
                        'link_delete' => route('admin.subscribe.destroy', $data->id),
                        'id_delete' => $data->id
                    ]
                )->render();
                }
            )
            ->escapeColumns([''])
            ->make(true);
    }

    public function destroy($id)
    {
        $subscribe = $this->subscribe->find($id);

        $subscribe->delete();

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_subscribe.subscribe')]));

        return redirect()->back();
    }

    public function updateActiveSubscribe(Request $request)
    {
        $input = $request->all();

        $subscribe = $this->subscribe->find($input['id']);

        $subscribe->update([
            'active' => $input['val']
        ]);

        return restSuccess();
    }

    public function exportExcel(Request $request)
    {
        $input = $request->all();

        $subscriber_type = $this->subscribe->getDataByType($input);

        $convertDataExcel = $this->convertDataExcel($subscriber_type);

        Excel::create('Subcriber_list', function($excel) use ($convertDataExcel) {
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
            return $item;
        });

        return collect($convertDataExcel->all());
    }
}
