<div class="row">
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_catalogue.form.image") !!}</div>
        <div class="form-group">
            @component('admin.layouts.components.upload_photo', [
                'image' => $catalogue->image ?? null,
                'name' => 'image',
            ])
            @endcomponent
        </div>
    </div>
    <div class="col-md-4">
        <div class="font-bold col-green">{{ trans('admin_catalogue.form.type') }}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <select id="types" class="form-control" name="type">
                    <option value="">---</option>
                    @foreach($types as $key => $value)
                        <option value="{{ $key }}" {{ !empty($catalogue) && $catalogue->type === $key  ? 'selected' : ''  }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="font-bold col-green">{!! trans("admin_catalogue.form.publish_date") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control datepicker" name="publish_date"
                       data-date-format="{!! JS_DATE !!}" id="publish_date"
                       value="{!! !empty($catalogue)  ? $catalogue->publish_date_format : old("publish_date") !!}">
                <div id="publish_date-container" style="position: relative"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group form-float">
            <div class="font-bold col-green">{{ trans('admin_catalogue.form.position') }}</div>
            <div class="form-line">
                <input type="number" id="position" class="form-control" name="position"
                       value="{{ $catalogue->position ?? 0 }}" required min="0">
            </div>
        </div>
    </div>
</div>

@include('admin.translation.nav_tab', [
    'object_trans' => $catalogue ?? null,
    'default_tab' => $composer_locale,
    'form_fields' => [
        ['type' => 'text', 'name' => 'name'],
        ['type' => 'text', 'name' => 'url']
    ],
    'metadata' => $metadata ?? null,
    'translation_file' => 'admin_catalogue',
])