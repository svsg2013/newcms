@extends("admin.layouts.master")

@section("meta")
    
@endsection

@section("style")
    <link href="/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet"/>
@endsection

@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">

                @include('admin.layouts.partials.message')

                @component('admin.layouts.components.form', [
                    'form_method' =>  empty($city_career) ? 'POST' : 'PUT',
                    'form_url' => empty($city_career) ? route("admin.city.career.store") : route("admin.city.career.update", $city_career->id)
                ])

                    <div class="row">
                        <div class="col-md-4">
                            <div class="font-bold col-green">{!! trans("admin_city.active") !!}</div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="checkbox" id="active" name="active"
                                        value="1" {!! !empty($city_career) && $city_career->active ? "checked" : null !!}>
                                    <label for="active">{!! trans("admin_city.form.active") !!}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Nav tabs -->
                        @include('admin.translation.nav_tab', [
                            'object_trans' => $city_career ?? null,
                            'default_tab' => 'vi',
                            'form_fields' => [
                                ['type' => 'text', 'name' => 'name']
                            ],
                            'tab_seo' => true,
                            'metadata' => $metadata ?? null,
                            'translation_file' => 'admin_city'
                        ])

                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.city.career.index")
                        ])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script type="text/javascript" src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>

    @if($composer_locale !== 'en')
        <script type="text/javascript"
                src="/assets/plugins/jquery-validation/localization/messages_{{ $composer_locale }}.js"></script>
    @endif

    <script type="text/javascript" src="/assets/admin/js/pages/city_career.create.js?v=1.1"></script>
@endsection