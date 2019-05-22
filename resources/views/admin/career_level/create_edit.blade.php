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
                    'form_method' =>  empty($career_level) ? 'POST' : 'PUT',
                    'form_url' => empty($career_level) ? route("admin.career_level.store") : route("admin.career_level.update", $career_level->id)
                    ])
                    <!-- Nav tabs -->
                        @include('admin.translation.nav_tab', [
                            'object_trans' => $career_level ?? null,
                            'default_tab' => $composer_locale,
                            'form_fields' => [
                                ['type' => 'text', 'name' => 'name']
                            ],
                            'translation_file' => 'admin_career_level'
                        ])

                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.career_level.index")
                        ])
                    @endcomponent

                </div>
            </div>
        </div>
    </div>
@endsection