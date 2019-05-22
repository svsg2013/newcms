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
                @include('admin.layouts.partials.message')

                @component('admin.layouts.components.form', [
                    'form_method' =>  empty($career_category) ? 'POST' : 'PUT',
                    'form_url' => empty($career_category) ? route("admin.career_category.store") : route("admin.career_category.update", $career_category->id)
                    ])
                    <!-- Nav tabs -->
                        @include('admin.translation.nav_tab', [
                            'default_tabs' => [
                                    [
                                        'id' => 'general',
                                        'name' => trans('admin_tab.general'),
                                        'path' => 'admin.career_category.partials.general'
                                    ],
                            ],
                            'object_trans' => $career_category ?? null,
                            'default_tab' => 'general',
                            'form_fields' => [
                                ['type' => 'text', 'name' => 'name']
                            ],
                            'translation_file' => 'admin_career_category'
                        ])

                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.career_category.index")
                        ])
                    @endcomponent

                </div>
            </div>
        </div>
    </div>
@endsection