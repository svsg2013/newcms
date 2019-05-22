@extends("admin.layouts.master")

@section("meta")
    <meta name="linkDatatable" content="{{ route('admin.landing_customer.datatable') }}"/>
@endsection

@section("style")
    <!--dataTables plugin-->
    <link rel="stylesheet" href="/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"/>
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css"/>
    <link href="/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet"/>
    <style>
        #datatable_filter {
            visibility: hidden;
        }
        .toolbar {
            float: left;
        }
    </style>
@endsection


@section("content")
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <a href="javascript:void(0)" class="btn btn-info waves-effect pull-right btn-toggle-filter">
                    <i class="material-icons">search</i>
                    <span>{!! trans("button.search") !!}</span>
                </a>
                <a href="javascript:void(0)" class="btn btn-warning waves-effect pull-right btn-toggle-export" style="margin-right: 10px;">
                    <i class="material-icons">import_export</i>
                    <span>Export Excel</span>
                </a>
                <h2>
                    {!! trans("admin_landing_customer.list") !!}
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="body">

                @include("admin.layouts.partials.message")

                <div style="display: none" id="form-filter" class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">{!! trans("button.search") !!}</div>
                    </div>
                    <div class="panel-body">
                        <form>
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="font-bold col-green">Name</div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="full_name" id="filter-full-name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="font-bold col-green">Email</div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="email" id="filter-email">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="font-bold col-green">Phone</div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="phone_number" id="filter-phone-number">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="font-bold col-green">Status</div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="status" id="filter-status" class="form-control">
                                                <option value="">---</option>
                                                <option value="1">Đặt lịch gọi lại</option>
                                                <option value="0">Đăng ký vay trực tuyến</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">


                                <div class="col-md-3">
                                    <div class="font-bold col-green">Phone Status</div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="status" id="filter-phone-status" class="form-control">
                                                <option value="">---</option>
                                                <option value="1">Xác nhận</option>
                                                <option value="0">Từ chối</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="font-bold col-green">Partner</div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select name="status" id="filter-partner" class="form-control">
                                                <option value="">---</option>
                                                @foreach($partners as $partner)
                                                    <option value="{{ $partner->campaign_source }}">{{ $partner->name }} - {{ $partner->campaign_source }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="font-bold col-green">Date From</div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control datepicker" name="date_from" readonly
                                                   data-date-format="dd-mm-yyyy" id="filter-date-created-start">
                                            <div id="filter-date-created-start-container" style="position: relative"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="font-bold col-green">Date To</div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control datepicker" name="date_to" readonly
                                                   data-date-format="dd-mm-yyyy" id="filter-date-created-end">
                                            <div id="filter-date-created-end-container" style="position: relative"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" href="javascript:void(0)" class="btn btn-info waves-effect">
                                    <i class="material-icons">skip_next</i>
                                    <span>Submit</span>
                                </button>
                                <button type="reset" href="javascript:void(0)" class="btn btn-info waves-effect">
                                    <i class="material-icons">refresh</i>
                                    <span>Reset</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div style="display: none" id="form-export" class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Export Excel</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('admin.landing_customer.export') }}" method="post">
                            {!! csrf_field() !!}

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="font-bold col-green">Từ ngày</div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control datepicker" name="date_from" readonly
                                                   data-date-format="dd-mm-yyyy" id="export_date_from">
                                            <div id="export_date_from-container" style="position: relative"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="font-bold col-green">Đến ngày</div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control datepicker" name="date_to" readonly
                                                   data-date-format="dd-mm-yyyy" id="export_date_to">
                                            <div id="export_date_to-container" style="position: relative"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="font-bold col-green">&nbsp;</div>
                                    <button class="btn btn-warning waves-effect" style="margin-right: 10px;">
                                        <i class="material-icons">import_export</i>
                                        <span>Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table id="datatable" class="table table-bordered table-striped table-hover dataTable" style="width: 100%">
                    <thead>
                    <tr>
                        <th width="40">{!! trans("admin_landing_customer.table.id") !!}</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Phone Status</th>
                        <th>Partner</th>
                        <th>Aff SID</th>
                        <th width="150">{!! trans("admin_landing_customer.table.action") !!}</th>
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
    <script src="/assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <!--dataTables plugin-->
    <script src="/assets/plugins/jquery-datatable/jquery.dataTables.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js" type="text/javascript"></script>


    <script type="text/javascript" src="/assets/admin/js/pages/landing_customer.index.js"></script>
@endsection