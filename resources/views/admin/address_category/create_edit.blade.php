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

                @include("admin.layouts.partials.message")

                @component('admin.layouts.components.form', [
                'form_method' =>  empty($address_category) ? 'POST' : 'PUT',
                'form_url' => empty($address_category) ? route("admin.address.category.store") : route("admin.address.category.update", $address_category->id)
                ])
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="font-bold col-green">Type</div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <select name="type[]" id="type" class="form-control" multiple="multiple">
                                    <option value="">---</option>
                                    @foreach(\App\Models\AddressCategory::types() as $key => $value)
                                        <option value="{{ $key }}" {{ !empty($address_category) && in_array($key, json_decode($address_category->type)) ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nav tabs -->
                @include('admin.translation.nav_tab', [
                    'object_trans' => $address_category ?? null,
                    'default_tab' => $composer_locale,
                    'form_fields' => [
                        ['type' => 'text', 'name' => 'name']
                    ],
                    'translation_file' => 'admin_address_category'
                ])

                {{--Buttons--}}
                @include("admin.layouts.partials.form_buttons", [
                    "cancel" => route("admin.address.category.index")
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

    <script src="/assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="/assets/admin/js/pages/address_category.create.js?v=1.0"></script>

    @php
        $single_menu =  json_encode(config('constants.single_menu'), JSON_UNESCAPED_SLASHES);
    @endphp

@endsection