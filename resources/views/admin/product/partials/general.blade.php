<div class="row">
    <div class="col-md-3">
        <div class="font-bold col-green">{!! trans("admin_product.form.icon") !!}</div>
        <div class="form-group">
            @component('admin.layouts.components.upload_photo', [
                'image' => $product->icon ?? null,
                'name' => 'icon',
            ])
            @endcomponent
        </div>
    </div>

    <div class="col-md-3">
        <div class="font-bold col-green">{!! trans("admin_product.form.image") !!}</div>
        <div class="form-group">
            @component('admin.layouts.components.upload_photo', [
                'image' => $product->image ?? null,
                'name' => 'image',
            ])
            @endcomponent
        </div>
    </div>
    <div class="col-md-3">
        <div class="font-bold col-green">{!! trans("admin_product.form.product_image") !!}</div>
        <div class="form-group">
            @component('admin.layouts.components.upload_photo', [
                'image' => $product->product_image ?? null,
                'name' => 'product_image',
            ])
            @endcomponent
        </div>
    </div>

    <div class="col-md-3">
        <div class="font-bold col-green">{!! trans("admin_product.form.banner") !!}</div>
        <div class="form-group">
            @component('admin.layouts.components.upload_photo', [
                'image' => $product->banner ?? null,
                'name' => 'banner',
            ])
            @endcomponent
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="font-bold col-green">{!! trans("admin_product.form.type") !!}</div>
        <div class="form-group">
            @foreach($types as $key => $name)
                <input type="radio" name="type" @if(!empty($product) && $product->type == $key) checked @endif value="{{ $key }}" id="{{ $key }}">
                <label class="m-r-15" for="{{ $key }}">{{ $name }}</label>
            @endforeach
        </div>
    </div>

    <div class="col-md-2">
        <div class="font-bold col-green">{!! trans("admin_product.form.active") !!}</div>
        <div class="form-group">
            <input type="checkbox" name="active" value="1" id="active" @if(!empty($product) && $product->active) checked @endif>
            <label for="active">{!! trans("admin_product.form.yes") !!}</label>
        </div>
    </div>

    <div class="col-md-2">
        <div class="font-bold col-green">{!! trans("admin_product.form.is_product") !!}</div>
        <div class="form-group">
            <input type="checkbox" name="is_product" value="1" id="is_product" @if(!empty($product) && $product->is_product) checked @endif>
            <label for="is_product">{!! trans("admin_product.form.yes") !!}</label>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group form-float">
            <div class="font-bold col-green">{!! trans("admin_product.form.position") !!}</div>
            <div class="form-line">
                <input type="number" id="position" class="form-control" name="position" value="{{ !empty($product) ? $product->position : 0  }}" required min="0">
            </div>
        </div>

        <div class="font-bold col-green"></div>
        <div class="form-group">

        </div>
    </div>
</div>