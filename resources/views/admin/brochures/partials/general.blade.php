<input type="hidden" value="{{auth()->user()->id}}" name="user_id"/>

<div class="row">
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_brochures.form.image") !!}</div>
        <div class="form-group">
            @component('admin.layouts.components.upload_photo', [
                'image' => $brochures->image ?? null,
                'name' => 'image',
            ])
            @endcomponent
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="font-bold col-green">{!! trans("admin_brochures.form.link_download") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" id="link_download_input" class="form-control"
                       name="link_download"
                       value="{!! !empty($brochures)  ? $brochures->link_download : old("link_download") !!}">
                <button type="button" class="btn btn-primary btn_select_a_file" data-append="#link_download_input" style="position: absolute; top: 2px; right:2px">{{ trans('button.or_select_a_file') }}</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <input type="checkbox" id="active" name="active"
                   value="1" {!! !empty($brochures) && $brochures->active ? "checked" : null !!}>
            <label for="active">{!! trans("admin_brochures.form.active") !!}</label>
        </div>
    </div>
</div>