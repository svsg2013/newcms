<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Repositories\FreeSpaceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FreeSpaceController extends Controller
{
    protected $free_space;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(FreeSpaceRepository $free_space)
    {
        $this->free_space = $free_space;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_free_space.title'));

        $tree = $this->free_space->arrTree(0);

        return view('admin.free_space.index', compact('tree'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Breadcrumb::title(trans('admin_free_space.create'));

        $tree = $this->free_space->arrTree(0);
        $type = 'radio';
        $list_id = [];
        $disable_id = [];
        $root = true;
        $out_put = view('admin.free_space.partials.tree',
            compact('tree', 'type', 'list_id', 'disable_id', 'root')
        )->render();

        return view(
            'admin.free_space.create_edit',
            compact(
                'out_put'
            )
        );
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

        $this->free_space->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_free_space.space')]));

        return redirect()->route('admin.free_space.index');
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
        Breadcrumb::title(trans('admin_free_space.edit'));

        $free_space = $this->free_space->find($id);

        $disable_id = [$id];

        $this->free_space->allChildrenIds($disable_id, $id);
        $tree = $this->free_space->arrTree(0);
        $type = 'radio';
        $root = true;
        $list_id = [$free_space->parent_id];

        $out_put = view('admin.free_space.partials.tree',
            compact('tree', 'type', 'list_id', 'disable_id', 'root')
        )->render();

        return view(
            'admin.free_space.create_edit',
            compact(
                'out_put',
                'free_space'
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

        $this->free_space->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_free_space.space')]));

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
        $this->free_space->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_free_space.space')]));

        return redirect()->back();
    }

    public function sort(Request $request)
    {
        $positions = $request->input('positions');
        $this->free_space->sort($positions);
        return restSuccess('Success');
    }

    public function updateStatus(Request $request, $id)
    {
        $active = $request->input('active');

        $active = $active ? 1 : 0;

        $model = $this->free_space->find($id);
        $model->active = $active;
        $model->save();

        $this->free_space->removeCache();

        return restSuccess(trans('admin_message.updated_successful', ['attr' => trans('admin_free_space.free_space')]));
    }
}
