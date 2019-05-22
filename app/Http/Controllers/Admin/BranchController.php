<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\ExportBranchToXmlJob;
use App\Models\Branch;
use App\Models\City;
use App\Repositories\BranchRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Breadcrumb;
use Yajra\DataTables\Facades\DataTables;

class BranchController extends Controller
{
    protected $branch;

    public function __construct(BranchRepository $branch)
    {
        $this->branch = $branch;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_branch.title'));

        return view('admin.branch.index', compact(
            'cities'
        ));
    }

    public function datatable()
    {
        $data = $this->branch->datatable();

        return DataTables::of($data)
            ->editColumn(
                'type',
                function ($data) {
                    return $data->label_type;
                }
            )
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
                            'link_edit' => route('admin.branch.edit', $data->id),
                            'link_delete' => route('admin.branch.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_branch.create'));

        $cities = City::where('country_id', 1)->get();

        $types = Branch::getTypes();

        return view('admin.branch.create_edit', compact(
            'cities',
            'types'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->branch->store($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_branch.branch')]));

        return redirect()->route('admin.branch.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Breadcrumb::title(trans('admin_branch.edit'));

        $branch = $this->branch->find($id);

        $types = Branch::getTypes();

        $cities = City::where('country_id', 1)->get();

        return view(
            'admin.branch.create_edit',
            compact(
                'branch',
                'cities',
                'types'
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

        $this->branch->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_branch.branch')]));

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
        $this->branch->destroy($id);

        dispatch(new ExportBranchToXmlJob());

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_branch.branch')]));

        return redirect()->back();
    }

    public function ajaxGetParents(Request $request)
    {
        $type = $request->get('type');

        $arr = [
            'parent_id' => 0,
            'type' => $type,
        ];
        $branches = $this->branch->branches($arr);

        $branches->load('children');

        $data = [];
        $data[] = ['id' => '', 'text' => '---'];
        $data[] = ['id' => '0', 'text' => trans('admin_branch.attr.root')];
        foreach ($branches as $branch) {
            $data[] = ['id' => $branch->id, 'text' => $branch->name];
            foreach ($branch->children as $rs) {
                $data[] = ['id' => $rs->id, 'text' => '--- ' . $rs->name];
            }
        }
        return restSuccess('Success', $data);
    }
}
