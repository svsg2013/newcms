@extends("admin.layouts.master")

@section("meta")
    <meta name="linkDatatable" content="{{ route('admin.career.application.datatable') }}"/>
@endsection

@section("style")
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css"/>

    <link rel="stylesheet" href="/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"/>

    <link href="/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet"/>

    <style>
        .select2 {
            width: 100%!important;
        }
        .show-hide-search {
            display: none;
        }
    </style>
@endsection


@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <a href="javascript:void(0)" class="btn btn-warning waves-effect pull-right search-career-application">
                        <i class="material-icons">import_export</i>
                        <span>Export Excel</span>
                    </a>
                    <h2>
                        {!! trans("admin_career.list") !!}
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="body">
                    @include("admin.layouts.partials.message")
                    <div class="show-hide-search">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="font-bold col-green">From</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control datepicker" name="date_from"
                                            data-date-format="dd-mm-yyyy" id="date_from">
                                        <div id="date_from-container" style="position: relative"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="font-bold col-green">To</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control datepicker" name="date_to"
                                            data-date-format="dd-mm-yyyy" id="date_to">
                                        <div id="date_to-container" style="position: relative"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="font-bold col-green">Position</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select id="department" name="department" class="form-control pull-right subcriber-type" style="width: 150px; margin-right: 15px;">
                                            <option value=""></option>
                                            @if(!empty($categories))
                                                @foreach($categories as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <a href="{{ route('application.export.excel') }}" class="btn btn-warning waves-effect application-export" style="margin-right: 10px;">
                                    <i class="material-icons">import_export</i>
                                    <span>Export</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <table id="datatable" class="table table-bordered table-striped table-hover dataTable"  style="width: 100%">
                        <thead>
                        <tr>
                            <th width="40">{!! trans("admin_career.table.id") !!}</th>
                            <th>{!! trans("admin_career.table.name") !!}</th>
                            <th>{!! trans("admin_career.table.position") !!}</th>
                            <th>{!! trans("admin_career.table.phone") !!}</th>
                            <th>{!! trans("admin_career.table.created_at") !!}</th>
                            <th width="150">{!! trans("admin_career.table.action") !!}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")

    <custtom id="details-template" class="hidden">
        <p><strong>{!! trans("admin_career.table.email") !!}:</strong> APPLY_EMAIL</p>
        <p><strong>{!! trans("admin_career.table.birthday") !!}:</strong> APPLY_BIRTHDAY</p>
        <p><strong>{!! trans("admin_career.table.gender") !!}:</strong> APPLY_GENDER</p>
        <p><strong>{!! trans("admin_career.table.cccd") !!}:</strong> APPLY_CCCD</p>
        <p><strong>{!! trans("admin_career.table.address") !!}:</strong> APPLY_ADDRESS</p>
        <p><strong>{!! trans("admin_career.table.reference") !!}:</strong> APPLY_REFERENCE</p>
        <p><strong>{!! trans("admin_career.table.latest_work") !!}:</strong> APPLY_LATEST_WORK</p>
        <p><strong>{!! trans("admin_career.table.latest_position") !!}:</strong> APPLY_LATEST_POSITION</p>
        <p><strong>{!! trans("admin_career.table.image") !!}:</strong> APPLY_IMAGE</p>
        <p><strong>{!! trans("admin_career.table.attach_file") !!}:</strong> APPLY_ATTACH_FILE</p>
    </custtom>

    <script src="/assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    
    <script src="/assets/plugins/jquery-datatable/jquery.dataTables.js" type="text/javascript"></script>

    <script src="/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js" type="text/javascript"></script>

    <script type="text/javascript" src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript" src="/assets/admin/js/pages/career_apply.index.js"></script>

@endsection