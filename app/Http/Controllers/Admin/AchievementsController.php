<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Models\Achievements;
use App\Repositories\AchievementsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class AchievementsController extends Controller
{
    protected $achievements;

    public function __construct(AchievementsRepository $achievements)
    {
        $this->achievements = $achievements;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Breadcrumb::title(trans('admin_achievements.title'));

        return view('admin.achievements.index');
    }

    public function datatable()
    {
        $data = $this->achievements->datatable();
        return DataTables::of($data)
            ->addColumn(
                'translations',
                function ($data) {
                    return $data->title;
                }
            )
            ->editColumn(
                'active',
                function ($data) {
                    return $data->active ? '<span class="label label-success">'.$data->label_active.'</span>' : '<span class="label label-warning">'.$data->label_active.'</span>';
                }
            )
            ->editColumn(
                'is_top',
                function ($data) {
                    return $data->is_top ? '<i class="material-icons col-pink">check</i>' : '<i class="material-icons">more_horiz</i>';
                }
            )
            ->editColumn(
                'publish_at',
                function ($data) {
                    return $data->publish_at_format;
                }
            )
            ->addColumn(
                'action',
                function ($data) {
                    return view('admin.layouts.partials.table_button')->with(
                        [
                        'link_edit' => route('admin.achievements.edit', $data->id),
                        'link_delete' => route('admin.achievements.destroy', $data->id),
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
        Breadcrumb::title(trans('admin_achievements.create'));

        return view('admin.achievements.create_edit');
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

        $this->achievements->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_achievements.achievements')]));

        return redirect()->route('admin.achievements.index');
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
        Breadcrumb::title(trans('admin_achievements.edit'));

        $achievements = $this->achievements->find($id);

        $metadata = $achievements->meta;

        return view('admin.achievements.create_edit', compact('achievements', 'categories', 'metadata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->achievements->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_achievements.achievements')]));

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
        $this->achievements->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_achievements.achievements')]));

        return redirect()->back();
    }
}
