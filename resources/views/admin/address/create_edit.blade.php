@extends("admin.layouts.master")

@section("meta")
@endsection

@section("style")
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css" />
@endsection

@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">

                @include('admin.layouts.partials.message')

                @component('admin.layouts.components.form', [
                    'form_method' =>  empty($address) ? 'POST' : 'PUT',
                    'form_url' => empty($address) ? route("admin.address.store") : route("admin.address.update", $address->id)
                ])
                    <!-- Nav tabs -->
                        @include('admin.translation.nav_tab', [
                            'default_tabs' => [
                                [
                                    'id' => 'general',
                                    'name' => trans('admin_tab.general'),
                                    'path' => 'admin.address.partials.general'
                                ]
                            ],
                            'object_trans' => $address ?? null,
                            'default_tab' => 'general',
                            'form_fields' => [
                                ['type' => 'text', 'name' => 'name']
                            ],
                            'tab_seo' => true,
                            'metadata' => $metadata ?? null,
                            'translation_file' => 'admin_address'
                        ])

                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.address.index")
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

    <script src="https://maps.googleapis.com/maps/api/js?key={!! config('services.google.map_key') !!}&libraries=places"></script>

    <script src="/assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="/assets/admin/js/pages/address.create.js?v=1.1"></script>
@endsection