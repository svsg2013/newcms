<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\Breadcrumb;
use App\Repositories\CatalogueRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\CatalogueRequest;
use App\Models\Catalogue;

class CatalogController extends Controller
{
    protected $catalogue;

    public function __construct(CatalogueRepository $catalogue)
    {

        $this->catalogue = $catalogue;
    }


    public function index()
    {
        Breadcrumb::title(trans('admin_catalogue.title'));

        return view('admin.catalogue.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        Breadcrumb::title(trans('admin_catalogue.create'));

        $types = Catalogue::types();

        return view('admin.catalogue.create_edit', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatalogueRequest $request)
    {
        $input = $request->all();

        $this->catalogue->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_catalogue.catalogue')]));

        return redirect()->route('admin.catalogue.index');
    }


    public function datatable()
    {
        $data = $this->catalogue->datatable();

        return DataTables::of($data)
            ->addColumn(
                'translations',
                function ($data) {
                    return $data->name;
                }
            )
            ->editColumn(
                'publish_date',
                function ($data) {
                    return $data->publish_date_format;
                }
            )
            ->editColumn('type', function ($data) {
                return $data->type_name;
            })
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                            'link_edit' => route('admin.catalogue.edit', $data->id),
                            'link_delete' => route('admin.catalogue.destroy', $data->id),
                            'id_delete' => $data->id
                        ]
                    )->render();
                }
            )
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Breadcrumb::title(trans('admin_catalogue.edit'));

        $types = Catalogue::types();

        $catalogue = $this->catalogue->find($id);

        return view('admin.catalogue.create_edit', compact('catalogue', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CatalogueRequest $request, $id)
    {
        $input = $request->all();

        $this->catalogue->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_catalogue.catalogue')]));

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
        $this->catalogue->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_catalogue.catalogue')]));

        return redirect()->back();
    }
}
