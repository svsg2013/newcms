<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\RegisterSightRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class RegisterSightseeingController extends Controller
{
    protected $register_sightseeing;

    public function __construct(RegisterSightRepository $register_sightseeing)
    {
        $this->register_sightseeing = $register_sightseeing;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_register_sightseeing.title'));

        return view('admin.register_sightseeing.index');
    }

    public function datatable()
    {
        $data = $this->register_sightseeing->datatable();

        return DataTables::of($data)
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                            'link_show' => route('admin.register_sightseeing.show', $data->id),
                            'link_delete' => route('admin.register_sightseeing.destroy', $data->id),
                            'id_delete' => $data->id
                        ]
                    )->render();
                }
            )
            ->escapeColumns(['name', 'phone', 'email', 'company'])
            ->make(true);
    }


    public function show($id)
    {
        $booking = $this->register_sightseeing->find($id);

        return view('admin.register_sightseeing.show', compact('booking'));
    }

    public function destroy($id)
    {
        $this->register_sightseeing->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_register_sightseeing.register_sightseeing')]));

        return redirect()->back();
    }
}
