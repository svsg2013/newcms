@extends("admin.layouts.master")

@section("meta")
    <meta name="linkDatatable" content="{{ route('admin.address.datatable') }}"/>
@endsection

@section("style")
    <!--dataTables plugin-->
    <link rel="stylesheet" href="/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"/>
@endsection


@section("content")
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">

                <form id="form-import" method="POST" action="{{ route('admin.address.import') }}" enctype='multipart/form-data'>
                    {{csrf_field()}}
                    <input style="display: none;" id="input-file" type="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
                </form>

                <a href="{!! route("admin.address.create") !!}" class="btn btn-info waves-effect pull-right">
                    <i class="material-icons">add</i>
                    <span>{!! trans("button.create") !!}</span>
                </a>
                <a id="button-import" class="btn btn-warning waves-effect pull-right" style="margin-right: 10px;">
                    <i class="material-icons">arrow_downward</i>
                    <span>Import Excel</span>
                </a>
                <h2>
                    {!! trans("admin_address.list") !!}
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="body">

                @include("admin.layouts.partials.message")

                <table id="datatable" class="table table-bordered table-striped table-hover dataTable" style="width: 100%">
                    <thead>
                    <tr>
                        <th width="40">{!! trans("admin_address.table.id") !!}</th>
                        <th>{!! trans("admin_address.table.category") !!}</th>
                        <th>{!! trans("admin_address.table.name") !!}</th>
                        <th>{!! trans("admin_address.table.active") !!}</th>
                        <th width="150">{!! trans("admin_address.table.action") !!}</th>
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

    <!--dataTables plugin-->
    <script src="/assets/plugins/jquery-datatable/jquery.dataTables.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js" type="text/javascript"></script>


    <script type="text/javascript" src="/assets/admin/js/pages/address.index.js?v=1.0"></script>
@endsection