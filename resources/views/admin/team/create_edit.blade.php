@extends("admin.layouts.master")

@section("style")
    <!--select 2 plugin-->
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css"/>
@endsection

@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    @include('admin.layouts.partials.message')

                    @component('admin.layouts.components.form', [
                        'form_method' =>  empty($team) ? 'POST' : 'PUT',
                        'form_url' => empty($team) ? route("admin.team.store") : route("admin.team.update", $team->id)
                    ])
                        @include('admin.translation.nav_tab', [
                            'default_tabs' => [
                                [
                                    'id' => 'general',
                                    'name' => trans('admin_tab.general'),
                                    'path' => 'admin.team.partials.general'
                                ]
                            ],
                            'object_trans' => $team ?? null,
                            'default_tab' => 'general',
                            'form_fields' => [
                                ['type' => 'text', 'name' => 'name'],
                                ['type' => 'text', 'name' => 'position'],
                                ['type' => 'textarea', 'name' => 'description'],
                                ['type' => 'textarea', 'name' => 'job_value'],
                                ['type' => 'textarea', 'name' => 'favorite'],
                                ['type' => 'ckeditor', 'name' => 'content']
                            ],
                            'form_plugins' => ['ckeditor'],
                            'tab_seo' => false,
                            'translation_file' => 'admin_team'
                        ])

                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.team.index")
                        ])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!--select 2 plugin-->
    <script src="/assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script>
        jQuery(function ($) {
            $('#business').select2({
                placeholder: "---"
            });
            $('#country').select2({
                placeholder: "---"
            });
        });
    </script>
@endsection