@extends("admin.layouts.master")

@section("meta")

@endsection

@section("style")
    <!--select 2 plugin-->
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css"/>
@endsection


@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    @include("admin.layouts.partials.message")

                    @component('admin.layouts.components.form', [
                    'form_method' =>  empty($free_space) ? 'POST' : 'PUT',
                    'form_url' => empty($free_space) ? route("admin.free_space.store") : route("admin.free_space.update", $free_space->id)
                    ])
                        <!-- Nav tabs -->
                            @include('admin.translation.nav_tab', [
                                 'default_tabs' => [
                                    [
                                        'id' => 'general',
                                        'name' => trans('admin_tab.general'),
                                        'path' => 'admin.free_space.partials.general'
                                    ]
                                ],
                                'object_trans' => $free_space ?? null,
                                'default_tab' => 'general',
                                'form_fields' => [
                                    ['type' => 'text', 'name' => 'name']
                                ],
                                'translation_file' => 'admin_free_space'
                            ])

                            {{--Buttons--}}
                            @include("admin.layouts.partials.form_buttons", [
                                "cancel" => route("admin.free_space.index")
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
        <script type="text/javascript" src="/assets/plugins/jquery-validation/localization/messages_{{ $composer_locale }}.js"></script>
    @endif

    <!--select 2 plugin-->
    <script src="/assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="/assets/admin/js/pages/free_space.create.js?v=1.2"></script>
@endsection