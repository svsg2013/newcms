<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\Breadcrumb;
use App\Models\Gallery;
use App\Repositories\GalleryRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\GalleryCreateRequest;


class GalleryController extends Controller
{
    protected $gallery;

    public function __construct( GalleryRepository $gallery )
    {
        $this->gallery = $gallery;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        Breadcrumb::title(trans('admin_gallery.title'));

        return view('admin.gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Breadcrumb::title(trans('admin_gallery.create'));

        return view('admin.gallery.create_edit');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryCreateRequest $request)
    {
        $input = $request->all();

        $this->gallery->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_gallery.gallery')]));

        return redirect()->route('admin.gallery.index');
    }

    public function datatable()
    {
        $data = $this->gallery->datatable();

        return Datatables::of($data)
            ->addColumn(
                'translations',
                function ($data) {
                    return $data->name;
                }
            )
            ->editColumn('type', function ($data) {
                return $data->type;
            })
            ->editColumn(
                'published_date',
                function ($data) {
                    return $data->published_date_format;
                }
            )
            ->addColumn(
                'action', function ($data) {
                return view('admin.layouts.partials.table_button')->with(
                    [
                        'link_edit' => route('admin.gallery.edit', $data->id),
                        'link_delete' => route('admin.gallery.destroy', $data->id),
                        'id_delete' => $data->id
                    ]
                )->render();
            }
            )
            ->escapeColumns([])
            ->make(true);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Breadcrumb::title(trans('admin_gallery.edit'));

        $gallery = $this->gallery->find($id);

        return view('admin.gallery.create_edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->gallery->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_gallery.gallery')]));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->gallery->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_gallery.gallery')]));

        return redirect()->back();
    }

    public function sortPhoto(Request $request)
    {
        $positions = $request->input('positions');
        $this->gallery->sortPhoto($positions);
        return restSuccess('Success');
    }
}