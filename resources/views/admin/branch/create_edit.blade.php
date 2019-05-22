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

                    @if(empty($branch))
                        <form id="form-form" method="post" action="{!! route("admin.branch.store") !!}"
                              enctype="multipart/form-data">
                    @else
                        <form id="form-form" method="post"
                              action="{!! route("admin.branch.update", $branch->id) !!}"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                    @endif

                    {{ csrf_field() }}
                    <!-- Nav tabs -->

                    @include("admin.branch.partials.tab")

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="information">
                                @include("admin.branch.partials.information")
                            </div>

                            <div role="tabpanel" class="tab-pane fade " id="location">
                                @include("admin.branch.partials.location")
                            </div>
                        </div>

                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.branch.index")
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    @include("admin.photo.upload_template")

    <script>
        const LINK_BRANCH_PARENT = '{!! route('admin.branch.ajax_get_parents') !!}';
        const BRANCH_PARENT_DEFAULT = '{!! empty($branch) ? '' : $branch->parent_id !!}';
    </script>

    <!--select 2 plugin-->
    <script src="/assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>

    @if($composer_locale !== 'en')
        <script type="text/javascript" src="/assets/plugins/jquery-validation/localization/messages_{{ $composer_locale }}.js"></script>
    @endif

    <script src="https://maps.googleapis.com/maps/api/js?key={!! config('services.google.map_key') !!}&libraries=places"></script>

    <script type="text/javascript" src="/assets/admin/js/pages/branch.create.js?v=1.1"></script>
@endsection