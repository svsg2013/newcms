@extends("admin.layouts.master")

@section("meta")
    @if(!empty($gallery))
        <meta name="linkSortPhoto" content="{{ route('admin.gallery.photo.sort', $gallery->id) }}"/>
    @endif
@endsection

@section("style")
    <link href="/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet"/>
@endsection

@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">

                    @include("admin.layouts.partials.message")

                    @component('admin.layouts.components.form', [
                        'form_method' =>  empty($gallery) ? 'POST' : 'PUT',
                        'form_url' => empty($gallery) ? route("admin.gallery.store") : route("admin.gallery.update", $gallery->id)
                    ])
                        @include("admin.gallery.partials.form")

                        @include("admin.layouts.partials.form_buttons", [
                                "cancel" => route("admin.gallery.index")
                            ])
                    @endcomponent
                </div>

            </div>
        </div>
    </div>
@endsection

@section("script")

    <script type="text/javascript" src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <script src="/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js" type="text/javascript"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>

    @if($composer_locale !== 'en')
        <script type="text/javascript"
                src="/assets/plugins/jquery-validation/localization/messages_{{ $composer_locale }}.js"></script>
    @endif

    <script type="text/javascript" src="/assets/admin/js/pages/gallery.create.js?v=1.1"></script>
@endsection