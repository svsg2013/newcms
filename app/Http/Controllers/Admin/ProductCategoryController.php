<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Breadcrumb;
use App\Models\ProductCategory;
use App\Models\Slider;
use App\Repositories\ProductCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    protected $category;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(ProductCategoryRepository $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        Breadcrumb::title(trans('admin_product_category.title'));

        $tree = $this->category->arrTreeCategories(0);

        $out_put = $this->category->outTreeCategorySortTable($tree);

        return view('admin.product_category.index', compact('out_put'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Breadcrumb::title(trans('admin_product_category.create_category'));

        $tree = $this->category->arrTreeCategories(0);

        $out_put = $this->category->outTreeCategoryRadioCheckbox($tree, $type = 'radio', $list_id = [], $disable_id = [], $root = true);

        $sliders = Slider::select('key')->groupBy('key')->get();

        $catalogues = null;

        return view(
            'admin.product_category.create_edit',
            compact(
                'out_put',
                'catalogues',
                'sliders'
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

        $this->category->store($input);

        session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_product_category.category')]));

        return redirect()->route('admin.product_category.index');
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
        Breadcrumb::title(trans('admin_product_category.edit_category'));

        $category = $this->category->find($id);

        $disable_ids = [
            $id
        ];

        $this->category->allChildrenIds($disable_ids, $id);

        $tree = $this->category->arrTreeCategories(0);

        $out_put = $this->category->outTreeCategoryRadioCheckbox($tree, $type = 'radio', $list_id = [$category->parent_id], $disable_ids, $root = true);

        $sliders = Slider::select('key')->groupBy('key')->get();

        $catalogues = $category->catalogues;

        return view(
            'admin.product_category.create_edit',
            compact(
                'out_put',
                'category',
                'sliders',
                'catalogues'
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

        $this->category->update($input, $id);

        session()->flash('success', trans('admin_message.updated_successful', ['attr' => trans('admin_product_category.category')]));

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
        $this->category->destroy($id);

        session()->flash('success', trans('admin_message.deleted_successful', ['attr' => trans('admin_product_category.category')]));

        return redirect()->back();
    }

    public function sort(Request $request)
    {
        $positions = $request->input('positions');
        $this->category->sort($positions);
        return restSuccess('Success');
    }

    public function updateStatus(Request $request, $id)
    {
        $active =  $request->input('active');

        $active = $active ? 1 : 0;

        $model = $this->category->find($id);
        $model->active = $active;
        $model->save();

        $this->category->removeCache();

        return restSuccess(trans('admin_message.updated_successful', ['attr' => trans('admin_product_category.category')]));
    }
}
