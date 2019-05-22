@extends("admin.layouts.master")

@section("meta")

@endsection

@section("style")
    <!--select 2 plugin-->
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css"/>
@endsection


@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    @include("admin.layouts.partials.message")

                    @if(empty($category))
                    <form id="form-form" method="post" action="{!! route("admin.product_category.store") !!}"
                          enctype="multipart/form-data">
                    @else
                    <form id="form-form" method="post"
                          action="{!! route("admin.product_category.update", $category->id) !!}"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    {{ csrf_field() }}
                        @include("admin.product_category.partials.tab")

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="information">
                                @include("admin.product_category.partials.information")
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="catalogue">
                                <p></p>
                                @include("admin.catalogue.form")
                            </div>
                        </div>

                    {{--Buttons--}}
                    @include("admin.layouts.partials.form_buttons", [
                        "cancel" => route("admin.product_category.index")
                    ])

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    @include("admin.photo.upload_template")
    @include("admin.catalogue.upload_template")

    <!-- Jquery Validation Plugin Css -->
    <script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>

    @if($composer_locale !== 'en')
        <script type="text/javascript" src="/assets/plugins/jquery-validation/localization/messages_{{ $composer_locale }}.js"></script>
    @endif

    <!--select 2 plugin-->
    <script src="/assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="/assets/admin/js/pages/product_category.create.js?v=1.2"></script>
@endsection