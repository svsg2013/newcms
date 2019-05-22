<div class="row">
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_shared_value.form.publish_at") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control datepicker" name="publish_at"
                       data-date-format="{!! JS_DATE !!}" id="publish_at"
                       value="{!! !empty($shared_value)  ? $shared_value->publish_at_format : old("publish_at") !!}">
                <div id="publish_at-container" style="position: relative"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <input type="checkbox" id="active" name="active"
                   value="1" {!! !empty($shared_value) && $shared_value->active ? "checked" : null !!}>
            <label for="active">{!! trans("admin_shared_value.form.active") !!}</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input type="checkbox" id="is_top" name="is_top"
                   value="1" {!! !empty($shared_value) && $shared_value->is_top ? "checked" : null !!}>
            <label for="is_top">{!! trans("admin_shared_value.form.is_top") !!}</label>
        </div>
    </div>
</div>