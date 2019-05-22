@extends("admin.layouts.master")

@section("meta")

@endsection

@section("style")

@endsection


@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">

                    @include("admin.layouts.partials.message")

                    @component('admin.layouts.components.form', [
                    'form_method' =>  empty($slider) ? 'POST' : 'PUT',
                    'form_url' => empty($slider) ? route("admin.slider.store") : route("admin.slider.update", $slider->id)
                    ])
                        <!-- Nav tabs -->
                        @include('admin.translation.nav_tab', [
                             'default_tabs' => [
                                [
                                    'id' => 'general',
                                    'name' => trans('admin_tab.general'),
                                    'path' => 'admin.slider.partials.general'
                                ]
                            ],
                            'object_trans' => $slider ?? null,
                            'default_tab' => 'general',
                            'form_fields' => [
                                ['type' => 'text', 'name' => 'name'],
                                ['type' => 'text', 'name' => 'link'],
                                ['type' => 'textarea', 'name' => 'description'],
                            ],
                            'translation_file' => 'admin_slider'
                        ])

                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.slider.index")
                        ])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <!-- Jquery Validation Plugin Css -->
    <script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>

    @if($composer_locale !== 'en')
        <script type="text/javascript"
                src="/assets/plugins/jquery-validation/localization/messages_{{ $composer_locale }}.js"></script>
    @endif

    <script type="text/javascript" src="/assets/admin/js/pages/slider.create.js?v=1.2"></script>
@endsection