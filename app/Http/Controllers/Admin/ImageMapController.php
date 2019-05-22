<?php

namespace App\Http\Controllers\Admin;

use App\Models\ImageArea;
use App\Models\ImageMap;
use App\Repositories\ImageMapRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Breadcrumb;
use Yajra\DataTables\Facades\DataTables;

class ImageMapController extends Controller
{
    protected $image_map;

    public function __construct(ImageMapRepository $image_map)
    {
        $this->image_map = $image_map;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_image_map.title'));

        return view('admin.image_map.index');
    }

    public function datatable()
    {
        $data = $this->image_map->datatable();

        return DataTables::of($data)
            ->addColumn(
                'translations',
                function ($data) {
                    return $data->name;
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                            'link_edit' => route('admin.image_map.edit', $data->id),
                            'link_delete' => route('admin.image_map.destroy', $data->id),
                            'id_delete' => $data->id
                        ]
                    )->render();
                }
            )
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Breadcrumb::title(trans('admin_image_map.create'));

        $shapes = ImageMap::shapes();

        return view('admin.image_map.create', compact('shapes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only('map');

        $this->image_map->create($input['map']);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_image_map.image_map')]));

        return redirect()->route('admin.image_map.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function editPoint($id)
    {
        $point = ImageArea::select('id')->where('id', $id)->with('translations')->firstOrFail();
        $content = $point->translations->keyBy('locale')->toArray();
        return $content;
    }

    public function updatePoint(Request $request, $id)
    {
        $input = $request->input('content');
        $point = ImageArea::select('id')->where('id', $id)->firstOrFail();
        $point->update($input);
        return $point;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Breadcrumb::title(trans('admin_image_map.edit'));

        $image_map = $this->image_map->find($id);

        $shapes = ImageMap::shapes();

        return view(
            'admin.image_map.edit',
            compact(
                'image_map',
                'shapes'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->image_map->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_image_map.image_map')]));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->image_map->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_image_map.image_map')]));

        return redirect()->back();
    }
}
