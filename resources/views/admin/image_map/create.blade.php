@extends("admin.layouts.master")

@section("style")
    <link rel="stylesheet" href="/assets/admin/css/image-map.css?v=1.0">
@endsection

@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    @include("admin.layouts.partials.message")

                    @component('admin.layouts.components.form', [
                        'form_method' => 'POST',
                        'form_id' => 'form-img',
                        'form_url' => route('admin.image_map.store')
                    ])
                        @component('admin.translation.nav_tab', [
                            'object_trans' => null,
                            'default_tab' => $composer_locale,
                            'form_fields' => [
                                ['type' => 'text', 'name' => 'name', 'default_name' => 'map[LOCALE][name]']
                            ],
                            'translation_file' => 'admin_image_map',
                           'tab_id' => 'map-name'
                        ])
                        @endcomponent

                        <div class="step">
                            <button type="button" class="btn btn-success btn-lg" id="image-mapper-upload">
                                {{ trans('button.select_image') }}
                            </button>
                        </div>

                        <div class="toggle-content p-b-20">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12" id="image-map-wrapper">
                                            <div id="image-map-container">
                                                <div id="image-map" class="image-mapper">
                                                    <img class="image-mapper-img">
                                                    <svg class="image-mapper-svg"></svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="image-mapper-table">
                                        <div class="module-items">
                                            <div class="module-item" style="padding: 15px;">
                                                <button class="btn btn-danger btn-delete btn-sm remove-row"
                                                        name="im[0][remove]" value="">
                                                    <i class="glyphicon glyphicon-remove"></i>
                                                </button>

                                                <div class="row">
                                                    <div class="col-xs-1 col-sm-1">
                                                        <div class="control-label input-sm">
                                                            <input class="index-active" type="radio" name="im[0][active]" id="im[0][active]"
                                                                   value="1"
                                                                   checked="checked">
                                                            <label for="im[0][active]"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5 col-sm-2">
                                                        <select name="im[0][shape]" class="form-control input-sm">
                                                            <option value="">---</option>
                                                            @foreach($shapes as $key => $name)
                                                                <option value="{{ $key }}">{{ $name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-5 col-sm-2">
                                                        <button type="button" class="btn btn-primary modal-area-content"
                                                                data-index="im[0]">
                                                            {{ trans('button.add_content') }}
                                                        </button>
                                                    </div>
                                                </div>

                                                @foreach($composer_locales as $key => $locale)
                                                    <textarea class="hidden" name="im[0][{{ $key }}content]"></textarea>
                                                @endforeach

                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-right m-t-10">
                                        <button type="button" class="btn btn-info waves-effect add-row">
                                            <i class="material-icons">add</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="id-output-area" class="hidden"></div>
                    @endcomponent

                    {{--Buttons--}}
                    @include("admin.layouts.partials.form_buttons", [
                        "cancel" => route("admin.image_map.index")
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        const IS_EDIT_PAGE = false;
        var AREA_POINT_URL = null;
        var AREA_POINT_ID = null;
    </script>

    @include('admin.image_map.partials.content')
    <!-- Jquery Validation Plugin Css -->
    <script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>

    @if($composer_locale !== 'en')
        <script type="text/javascript" src="/assets/plugins/jquery-validation/localization/messages_{{ $composer_locale }}.js"></script>
    @endif

    <script type="text/javascript" src="/assets/admin/js/pages/image_map.area.js"></script>
    <script src="/assets/admin/js/pages/image_map.create.js?v=1.0"></script>
@endsection