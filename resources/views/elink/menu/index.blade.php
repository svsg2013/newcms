@extends("admin.layouts.master")

@section("meta")
    <meta name="linkSort" content=""/>
@endsection

@section("style")
    <link rel="stylesheet" href="/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.css"/>
@endsection


@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <a href="#" class="btn btn-info waves-effect pull-right">
                        <i class="material-icons">add</i>
                        <span>{{ trans('button.create') }}</span>
                    </a>
                    <h2>
                        {!! trans("elink_.list") !!}
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="body">
                    @include('elink.layouts.partials.message')

                    {!! $menu->outUl() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    @include('elink.layouts.partials.modal-delete')

    <script src="/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="/assets/elink/js/pages/menu.index.js?v=1.1"></script>
@endsection