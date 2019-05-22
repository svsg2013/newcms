@extends("admin.layouts.master")

@section("meta")
    <meta name="linkDatatable" content="{{ route('admin.subscribe.datatable') }}"/>
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
                    <a href="{{ route('subcriber.export.excel') }}" class="btn btn-warning waves-effect pull-right subcriber-export" style="margin-right: 10px;">
                        <i class="material-icons">import_export</i>
                        <span>Export Excel</span>
                    </a>

                    <select id="type" name="type" class="form-control pull-right subcriber-type" style="width: 150px; margin-right: 15px;">
                        <option value="">---</option>
                        @if($subcriber_type = \App\Models\Subscribe::types())
                            @foreach($subcriber_type as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        @endif
                    </select>
                    
                    <h2>
                        {!! trans("admin_subscribe.list") !!}
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="body">
                    @include("admin.layouts.partials.message")
                    <table id="datatable" class="table table-bordered table-striped table-hover dataTable"
                           style="width: 100%">
                        <thead>
                        <tr>
                            <th width="40">{!! trans("admin_subscribe.table.id") !!}</th>
                            <th>{!! trans("admin_subscribe.table.email") !!}</th>
                            <th>{!! trans("admin_subscribe.table.active") !!}</th>
                            <th>{!! trans("admin_subscribe.table.type") !!}</th>
                            <th>{!! trans("admin_subscribe.table.created_at") !!}</th>
                            <th width="150">{!! trans("admin_subscribe.table.action") !!}</th>
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

    <script type="text/javascript">

        const URL_UPDATE_ACTIVE_SUBSCRIBE = '{{ route("update.active.subscribe") }}';

    </script>
    
    <!--dataTables plugin-->
    <script src="/assets/plugins/jquery-datatable/jquery.dataTables.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"
            type="text/javascript"></script>

    <script type="text/javascript" src="/assets/admin/js/pages/subscribe.index.js"></script>
@endsection