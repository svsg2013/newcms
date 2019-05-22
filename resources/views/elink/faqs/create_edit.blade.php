@extends("admin.layouts.master")


@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">

                    @include("admin.layouts.partials.message")

                    @component('admin.layouts.components.form', [
                        'form_method' =>  empty($faq) ? 'POST' : 'PUT',
                        'form_url' => empty($faq) ? route("admin.faq.store") : route("admin.faq.update", $faq->id)
                    ])
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="font-bold col-green">{{ trans('admin_faq.form.category') }}</div>
                                    <div class="form-line">
                                        <select name="category_id" id="" class="form-control">
                                            <option value="">---</option>
                                            @foreach($categories as $rs)
                                                <option value="{{ $rs->id }}" {{ !empty($faq) && $faq->category_id === $rs->id ? 'selected' : ''   }}>{{ $rs->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="font-bold col-green">{{ trans('admin_faq.form.position') }}</div>
                                    <div class="form-line">
                                        <input type="number" id="position" class="form-control" name="position"
                                               value="{{ $faq->position ?? 0 }}" required min="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('admin.translation.nav_tab', [
                            'object_trans' => $faq ?? null,
                            'default_tab' => $composer_locale,
                            'form_fields' => [
                                ['type' => 'text', 'name' => 'question'],
                                ['type' => 'textarea', 'name' => 'answer'],
                            ],
                            'translation_file' => 'admin_faq'
                        ])

                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.faq.index")
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

    <script type="text/javascript" src="/assets/admin/js/pages/faq.create.js?v=1.1"></script>
@endsection