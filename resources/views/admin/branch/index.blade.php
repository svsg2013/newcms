@extends("admin.layouts.master")

@section("meta")
    <meta name="linkDatatable" content="{{ route('admin.branch.datatable') }}"/>
@endsection

@section("style")
    <!--select 2 plugin-->
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css"/>

    <!--dataTables plugin-->
    <link rel="stylesheet" href="/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"/>
@endsection


@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <a href="{!! route("admin.branch.create") !!}" class="btn btn-info waves-effect pull-right">
                        <i class="material-icons">add</i>
                        <span>{!! trans("button.create") !!}</span>
                    </a>
                    <h2>
                        {!! trans("admin_branch.list") !!}
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="body">
                    @include("admin.layouts.partials.message")

                    <table id="datatable" class="table table-bordered table-striped table-hover dataTable"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th width="40">{!! trans("admin_branch.table.id") !!}</th>
                            <th>{!! trans("admin_branch.table.type") !!}</th>
                            <th>{!! trans("admin_branch.table.name") !!}</th>
                            <th>{!! trans("admin_branch.table.email") !!}</th>
                            <th width="150">{!! trans("admin_branch.table.action") !!}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    @include("admin.layouts.partials.modal-delete")

    <!--select 2 plugin-->
    <script src="/assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <!--dataTables plugin-->
    <script src="/assets/plugins/jquery-datatable/jquery.dataTables.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"
            type="text/javascript"></script>


    <script type="text/javascript" src="/assets/admin/js/pages/branch.index.js"></script>
@endsection