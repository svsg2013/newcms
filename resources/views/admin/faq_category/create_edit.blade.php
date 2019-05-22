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
                        'form_method' =>  empty($faq_category) ? 'POST' : 'PUT',
                        'form_url' => empty($faq_category) ? route("admin.faq_category.store") : route("admin.faq_category.update", $faq_category->id)
                    ])
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="font-bold col-green">{{ trans('admin_faq_category.form.position') }}</div>
                                    <div class="form-line focused">
                                        <input type="number" id="position" class="form-control" name="position" value="{{ $faq_category->position ?? 0 }}" required min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="font-bold col-green">{{ trans('admin_faq_category.form.type') }}</div>
                                    <div class="form-line">
                                        <select name="type" id="type" class="form-control">
                                            <option value="">---</option>
                                            @foreach(\App\Models\FaqCategory::types() as $key => $value)
                                                <option value="{{ $key }}" {{ !empty($faq_category) && $faq_category->type == $key ? 'selected' : ''   }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('admin.translation.nav_tab', [
                            'object_trans' => $faq_category ?? null,
                            'default_tab' => $composer_locale,
                            'form_fields' => [
                                ['type' => 'text', 'name' => 'name'],
                                ['type' => 'photo_translation', 'name' => 'icon']
                            ],
                            'translation_file' => 'admin_faq_category'
                        ])

                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.faq_category.index")
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

    <script type="text/javascript" src="/assets/admin/js/pages/faq_category.create.js?v=1.0"></script>
@endsection