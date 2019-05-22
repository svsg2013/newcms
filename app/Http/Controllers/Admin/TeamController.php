<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Http\Controllers\Controller;
use App\Repositories\TeamRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TeamController extends Controller
{
    protected $team;

    public function __construct(
        TeamRepository $team
    )
    {
        $this->team = $team;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Breadcrumb::title(trans('admin_team.title'));

        return view('admin.team.index');
    }

    public function datatable()
    {
        $data = $this->team->datatable();
        return DataTables::of($data)
            ->editColumn('avatar', function ($data) {
                return $data->avatar ? '<img height="70" src="'. $data->avatar .'" />' : '---';
            })
            ->editColumn('team_category', function ($data) {
                return config('team-category')[$data->team_category];
            })
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
                            'link_edit' => route('admin.team.edit', $data->id),
                            'link_delete' => route('admin.team.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_team.create'));

        return view('admin.team.create_edit');
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

        $this->team->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_team.team')]));
        return redirect()->route('admin.team.index');
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
        Breadcrumb::title(trans('admin_team.edit'));

        $team = $this->team->find($id);
        return view('admin.team.create_edit', compact('team'));
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

        $this->team->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_team.team')]));

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
        $this->team->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_team.team')]));

        return redirect()->back();
    }
}
