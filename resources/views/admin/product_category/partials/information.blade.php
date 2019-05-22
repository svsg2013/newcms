<div class="row">
    <div class="col-md-12">
        <p>{!! trans("admin_product_category.form.parent_category") !!}</p>
        <div class="form-group">
            <div class="list-tree">
                {!! $out_put !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <p>{!! trans("admin_product_category.form.logo") !!}</p>
        <div class="form-group">
            @include('admin.photo.form', [
                'object_image' => [
                    'append' => 'category-logo',
                    'image' => !empty($category->logo) ?  assetStorage($category->logo) : null,
                    'image_value' => !empty($category->logo) ?  $category->logo : null,
                    'name' => 'category_logo',
                    'delete' => 'delete_logo'
                ]
            ])
        </div>
    </div>

    <div class="col-md-4">
        <p>{!! trans("admin_product_category.form.icon") !!}</p>
        <div class="form-group">
            @include('admin.photo.form', [
                'object_image' => [
                    'append' => 'category-icon',
                    'image' => !empty($category->icon) ?  assetStorage($category->icon) : null,
                    'image_value' => !empty($category->icon) ?  $category->icon : null,
                    'name' => 'category_icon',
                    'delete' => 'delete_icon'
                ]
            ])
        </div>
    </div>
    <div class="col-md-4">
        <p>{!! trans("admin_product_category.form.image") !!}</p>
        <div class="form-group">
            @include('admin.photo.form', [
                'object_image' => [
                    'append' => 'category-image',
                    'image' => !empty($category->image) ?  assetStorage($category->image) : null,
                    'image_value' => !empty($category->image) ?  $category->image : null,
                    'name' => 'category_image',
                    'delete' => 'delete_image'
                ]
            ])
        </div>
    </div>
</div>

<hr>
<div class="row">
    @include("admin.translation.form", [
        "object_trans" => !empty($category) ? $category : null,
        "form_fields" => [
            ["type" => "text", "name" => "name"],
            ["type" => "textarea", "name" => "description"]

        ],
        "translation_file" => "admin_product_category"
    ])
</div>

<hr>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <input type="checkbox" id="is_top" name="is_top"
                   value="1" {!! !empty($category) && $category->is_top ? "checked" : null !!}>
            <label for="is_top">{!! trans("admin_product_category.form.is_top") !!}</label>
        </div>
    </div>

    <div class="col-md-4">
        <p>{!! trans("admin_product_category.form.slider_key") !!}</p>
        <div class="form-group form-float">
            <div class="form-line">
                <select class="form-control" name="slider_key" id="slider_key" style="width: 100%">
                    <option value="">---</option>
                    @foreach($sliders as $rs)
                        <option value="{{ $rs->key }}" {!! !empty($category) && $category->slider_key == $rs->key ? "selected" : null !!} >{{ $rs->key }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>