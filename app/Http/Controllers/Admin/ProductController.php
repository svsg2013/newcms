<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Models\Product;
use App\Models\ProductBlock;
use App\Repositories\ImageMapRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    protected $product;
    protected $image_map;

    public function __construct(
        ProductRepository $product,
        ImageMapRepository $image_map
    )
    {
        $this->product = $product;
        $this->image_map = $image_map;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_product.title'));

        return view('admin.product.index');
    }

    public function datatable()
    {
        $data = $this->product->datatable();

        return DataTables::of($data)
            ->addColumn(
                'translations',
                function ($data) {
                    return $data->name;
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
                            'link_edit' => route('admin.product.edit', $data->id),
                            'link_delete' => route('admin.product.destroy', $data->id),
                            'id_delete' => $data->id
                        ]
                    )->render();
                })
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
        Breadcrumb::title(trans('admin_product.create'));

        $types = Product::types();

        $block_types = ProductBlock::types();

        return view('admin.product.create_edit', compact('types', 'block_types'));
    }

    public function loadBlock(Request $request)
    {
        $type = $request->get('type');
        if ($type === ProductBlock::TYPE_IMAGE_MAP) {
            $image_map = $this->image_map->get();
        }
        $time = time();
        $name = "blocks[{$time}]";
        return view("admin.product.partials.component.block", compact('name', 'image_map', 'type'))->render();
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

        $this->product->create($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_product.product')]));

        return redirect()->route('admin.product.index');
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
        Breadcrumb::title(trans('admin_product.edit'));

        $product = $this->product->find($id);

        $types = Product::types();

        $block_types = ProductBlock::types();

        $image_map = $this->image_map->get();

        $metadata = $product->meta;

        return view('admin.product.create_edit', compact(
            'product',
            'types',
            'block_types',
            'image_map',
            'metadata'
        ));
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

        $this->product->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_product.product')]));

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
        $this->product->delete($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_product.product')]));

        return redirect()->back();
    }

    public function sortPhoto(Request $request)
    {
        $positions = $request->input('positions');
        $this->product->sortPhoto($positions);
        return restSuccess('Success');
    }
}
