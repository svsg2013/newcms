<h3>{{ trans('admin_product.photos') }}</h3>
<ul id="sortable-photos" class="list-photos">
    @isset($product)
        @foreach($product->medias as $rs)
            @component('admin.layouts.components.li_photo', [
                'photo_id' => $rs->id,
                'photo_path' => $rs->path,
                'input_delete' => 'delete_photos[]'
            ])
            @endcomponent
        @endforeach
    @endisset
</ul>

<div class="text-center">
    <button type="button" class="btn btn-primary ckfinder-multi" data-append="#sortable-photos" data-name="photos[]">
        {{ trans('button.add_photos') }}
    </button>
</div>