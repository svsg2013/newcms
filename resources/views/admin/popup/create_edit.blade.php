@extends("admin.layouts.master")

@section("style")
    <link href="/assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
@endsection

@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    @include('admin.layouts.partials.message')

                    @component('admin.layouts.components.form', [
                        'form_method' =>  empty($popup) ? 'POST' : 'PUT',
                        'form_url' => empty($popup) ? route("admin.popup.store") : route("admin.popup.update", $popup->id)
                    ])
                        @include('admin.translation.nav_tab', [
                            'default_tabs' => [
                                [
                                    'id' => 'general',
                                    'name' => trans('admin_tab.general'),
                                    'path' => 'admin.popup.partials.general'
                                ]
                            ],
                            'object_trans' => $popup ?? null,
                            'default_tab' => 'general',
                            'form_fields' => [
                                ['type' => 'ckeditor', 'name' => 'content']
                            ],
                            'form_plugins' => ['ckeditor'],
                            'tab_seo' => false,
                            'translation_file' => 'admin_popup'
                        ])

                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.popup.index")
                        ])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

    <script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>

    <script src="/assets/plugins/jquery-validation/localization/messages_vi.js"></script>

    <script type="text/javascript" src="/assets/admin/js/pages/popup.create.js"></script>
@endsection