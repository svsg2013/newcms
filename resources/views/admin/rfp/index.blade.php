@extends("admin.layouts.master")

@section("meta")
    <meta name="linkDatatable" content="{{ route('admin.rfp.datatable') }}"/>
@endsection

@section("style")
    <!--dataTables plugin-->
    <link rel="stylesheet" href="/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"/>
    <style>
        .tag {
            border-radius: 3px;
            color: #999;
            display: inline-block;
            height: 26px;
            line-height: 26px;
            padding: 0 20px 0 23px;
            position: relative;
            margin: 0 10px 10px 0;
            text-decoration: none;
            -webkit-transition: color 0.2s;
            background-color: #dcdaa6;
            color: #000000;
        }

        .tag::before {
            border-radius: 10px;
            box-shadow: inset 0 1px rgb(255, 192, 0);
            content: '';
            height: 6px;
            left: 10px;
            position: absolute;
            width: 6px;
            top: 10px;
        }
    </style>
@endsection


@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {!! trans("admin_contact.list") !!}
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="body">
                    @include("admin.layouts.partials.message")
                    <table id="datatable" class="table table-bordered table-striped table-hover dataTable"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th width="40">{!! trans("admin_contact.table.id") !!}</th>
                            <th>{!! trans("admin_contact.table.last_name") !!}</th>
                            <th>{!! trans("admin_contact.table.phone") !!}</th>
                            <th>{!! trans("admin_contact.table.email") !!}</th>
                            <th>{!! trans("admin_contact.table.created_at") !!}</th>
                            <th width="150">{!! trans("admin_contact.table.action") !!}</th>
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

    <custtom id="details-template" class="hidden">
        <p><strong>{!! trans("admin_contact.table.full_name") !!}:</strong> FULL_NAME </p>
        <p><strong>{!! trans("admin_contact.table.company") !!}:</strong> COMPANY</p>
        <p><strong>{!! trans("admin_contact.table.country") !!}:</strong> COUNTRY</p>
        <p><strong>{!! trans("admin_contact.table.solution") !!}:</strong></p>
        <div>SOLUTIONS</div>
        <p><strong>{!! trans("admin_contact.table.requirement_detail") !!}:</strong></p>
        <p> REQUIREMENT_DETAIL </p>
    </custtom>

    <!--dataTables plugin-->
    <script src="/assets/plugins/jquery-datatable/jquery.dataTables.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"
            type="text/javascript"></script>

    <script type="text/javascript" src="/assets/admin/js/pages/rfp.index.js"></script>
@endsection