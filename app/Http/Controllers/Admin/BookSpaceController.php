<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\BookSpaceRepository;
use App\Repositories\FreeSpaceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class BookSpaceController extends Controller
{
    protected $book_space;

    public function __construct(BookSpaceRepository $book_space)
    {
        $this->book_space = $book_space;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_book_space.title'));

        return view('admin.book_space.index');
    }

    public function datatable()
    {
        $data = $this->book_space->datatable();

        return DataTables::of($data)
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                            'link_show' => route('admin.book_space.show', $data->id),
                            'link_delete' => route('admin.book_space.destroy', $data->id),
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
        $booking = $this->book_space->find($id);

        return view('admin.book_space.show', compact('booking'));
    }

    public function destroy($id)
    {
        $this->book_space->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_book_space.book_space')]));

        return redirect()->back();
    }
}
