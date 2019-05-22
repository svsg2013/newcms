@extends("admin.layouts.master")

@section("meta")
    <meta name="linkDatatable" content="{{ route('admin.book_space.datatable') }}"/>
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
                <h2>{!! trans("admin_book_space.list") !!}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="body">

                @include("admin.layouts.partials.message")

                <table id="datatable" class="table table-bordered table-striped table-hover dataTable" style="width: 100%">
                    <thead>
                    <tr>
                        <th width="40">{!! trans("admin_book_space.table.id") !!}</th>
                        <th>{!! trans("admin_book_space.table.name") !!}</th>
                        <th>{!! trans("admin_book_space.table.phone") !!}</th>
                        <th>{!! trans("admin_book_space.table.email") !!}</th>
                        <th>{!! trans("admin_book_space.table.company") !!}</th>
                        <th>{!! trans("admin_book_space.table.created_at") !!}</th>
                        <th width="150">{!! trans("admin_book_space.table.action") !!}</th>
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


    <script type="text/javascript" src="/assets/admin/js/pages/book_space.index.js?v=1.0"></script>
@endsection