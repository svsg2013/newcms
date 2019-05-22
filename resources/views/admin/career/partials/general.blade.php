<div class="row">
    <!-- <div class="col-md-6 col-sm-6 col-xs-6">
        @component('admin.layouts.components.html_select', [
            'label' => trans('admin_career.form.employer'),
            'name' => 'employer',
            'default' => $career->employer ?? null,
            'options' => $employer
        ])
        @endcomponent
    </div> -->
    {{--  <div class="col-md-4 col-sm-4 col-xs-4">
        @component('admin.layouts.components.html_select', [
            'label' => trans('admin_career.form.category'),
            'name' => 'category_id',
            'default' => $career->category_id ?? null,
            'options' => $categories->pluck('name', 'id')->toArray()
        ])
        @endcomponent
    </div>  --}}
    <div class="col-md-4 col-sm-4 col-xs-4">
        @component('admin.layouts.components.html_select', [
            'label' => trans('admin_career.form.experience'),
            'name' => 'level_id',
            'default' => $career->level_id ?? null,
            'options' => $levels->pluck('name', 'id')->toArray()
        ])
        @endcomponent
    </div>

    <div class="col-md-4 col-sm-4 col-xs-4">
        @component('admin.layouts.components.html_select', [
            'label' => trans('admin_career.form.working_time'),
            'name' => 'working_time',
            'default' => $career->working_time ?? null,
            'options' => $working_time
        ])
        @endcomponent
    </div>

    <div class="col-md-4 col-sm-4 col-xs-4">
        @component('admin.layouts.components.html_select', [
            'label' => trans('admin_career.form.location'),
            'name' => 'city_id',
            'default' => !empty($career) ? $career->city()->id : null,
            'options' => $locations->pluck('name', 'id')->toArray()
        ])
        @endcomponent
    </div>
    <div class="col-md-4 col-sm-4 col-xs-4">
        @component('admin.layouts.components.html_select', [
            'label' => trans('admin_career.form.department'),
            'name' => 'category_id',
            'default' => !empty($career) ? $career->category_id : null,
            'options' => $categories->pluck('name', 'id')->toArray()
        ])
        @endcomponent
    </div>
</div>

<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-4">
        <div class="font-bold col-green">{!! trans("admin_career.form.published_date") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" id="published_date" name="published_date" data-date-format="{!! JS_DATE !!}"
                       value="{{ !empty($career) ? $career->published_date_format : old('published_date') }}">
                <div id="published_date-container" style="position: relative"></div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-4">
        <div class="font-bold col-green">{!! trans("admin_career.form.expired_date") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" id="expired_date" name="expired_date" data-date-format="{!! JS_DATE !!}"
                       value="{{ !empty($career) ?  $career->expired_date_format : old('expired_date') }}">
                <div id="expired_date-container" style="position: relative"></div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-4">
        <div class="font-bold col-green">{!! trans("admin_career.form.quantity") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="number" class="form-control" id="quantity" name="quantity" min="0"
                       value="{{ !empty($career) ? $career->quantity : old('quantity',1) }}">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-4">
        @component('admin.layouts.components.html_select', [
                'label' => trans('admin_career.form.status'),
                'name' => 'status',
                'default' => !empty($career) ? $career->status : null,
                'options' => $statuses
            ])
        @endcomponent
    </div>

    <div class="col-md-2 col-sm-2 col-xs-2">
        <div class="form-group">
            <br class="hidden-sm hidden-xs">
            <input type="checkbox" id="accept_aplly" name="accept_aplly"
                   value="1" {!! !empty($career) && $career->accept_aplly ? 'checked' : null !!}>
            <label for="accept_aplly">{!! trans("admin_career.form.accept_aplly") !!}</label>
        </div>
    </div>

    <div class="col-md-2 col-sm-2 col-xs-2">
        <div class="form-group">
            <br class="hidden-sm hidden-xs">
            <input type="checkbox" id="is_top" name="is_top"
                   value="1" {!! !empty($career) && $career->is_top ? 'checked' : null !!}>
            <label for="is_top">{!! trans("admin_career.form.is_top") !!}</label>
        </div>
    </div>

    <div class="col-md-2 col-sm-2 col-xs-2">
        <div class="form-group">
            <br class="hidden-sm hidden-xs">
            <input type="checkbox" id="is_manager" name="is_manager"
                   value="1" {!! !empty($career) && $career->is_manager ? 'checked' : null !!}>
            <label for="is_manager">{!! trans("admin_career.form.is_manager") !!}</label>
        </div>
    </div>
</div>