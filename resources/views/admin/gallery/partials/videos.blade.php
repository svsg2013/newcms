
<div class="row">
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_gallery.form.link_video") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="url_video" value="{{ !empty($gallery) ? $gallery->url_video : old("url_video") }}">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_gallery.form.position") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="number" class="form-control" name="position" value="{{ !empty($gallery) ? $gallery->position : '0' }}" required min="0">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_gallery.form.published_date") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control datepicker" name="published_date"
                       data-date-format="{!! JS_DATE !!}" id="published_date"
                       value="{!! !empty($gallery)  ? $gallery->published_date_format : old("published_date") !!}">
                <div id="published_date-container" style="position: relative"></div>
            </div>
        </div>
    </div>
</div>

@include('admin.translation.nav_tab', [
    'object_trans' => $gallery ?? null,
    'default_tab' => $composer_locale,
    'form_fields' => [
        ['type' => 'text', 'name' => 'name'],
        ['type' => 'textarea', 'name' => 'description']
    ],
    'metadata' => $metadata ?? null,
    'translation_file' => 'admin_gallery',
])