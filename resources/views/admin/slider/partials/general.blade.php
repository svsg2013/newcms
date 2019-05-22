<div class="row">
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_slider.form.image") !!}</div>
        <div class="form-group">
            @component('admin.layouts.components.upload_photo', [
                'image' => $slider->image ?? null,
                'name' => 'image',
            ])
            @endcomponent
        </div>
    </div>

    {{--  <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_slider.form.key") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="key" value="{{ $slider->key ?? null }}">
            </div>
            <p>{!! trans("admin_slider.form.key_description") !!}</p>
        </div>
    </div>  --}}
</div>