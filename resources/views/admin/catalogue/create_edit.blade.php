@extends("admin.layouts.master")

@section("meta")
@endsection

@section("style")
    <link href="/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet"/>
@endsection

@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">

                    @include('admin.layouts.partials.message')

                    @component('admin.layouts.components.form', [
                        'form_method' =>  empty($catalogue) ? 'POST' : 'PUT',
                        'form_url' => empty($catalogue) ? route("admin.catalogue.store") : route("admin.catalogue.update", $catalogue->id)
                    ])
                    
                    @include("admin.catalogue.partials.general")

                    {{--Buttons--}}
                    @include("admin.layouts.partials.form_buttons", [
                        "cancel" => route("admin.catalogue.index")
                    ])

                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script type="text/javascript" src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>
    @if($composer_locale !== 'en')
        <script type="text/javascript" src="/assets/plugins/jquery-validation/localization/messages_{{ $composer_locale }}.js"></script>
    @endif

    <script type="text/javascript" src="/assets/admin/js/pages/catalogue.create.js?v=1.1"></script>
@endsection