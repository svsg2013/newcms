@extends("admin.layouts.master")

@section("meta")
    <meta name="linkDatatable" content="{{ route('admin.loan.management.datatable') }}"/>
@endsection

@section("style")
    <link href="/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet"/>

    <!--dataTables plugin-->
    <link rel="stylesheet" href="/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"/>

    <style type="text/css">
        .show-hide-search, .show-hide-export {
            display: none;
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
                <a href="javascript:void(0)" class="btn pull-right" style="background: tranparent;box-shadow: none;"></a>
                <a href="javascript:void(0)" class="btn btn-info waves-effect pull-right search-loan-management">
                    <i class="material-icons">search</i>
                    <span>{!! trans("button.search") !!}</span>
                </a>
                <a href="javascript:void(0)" class="btn btn-warning waves-effect pull-right button-show-input-export" style="margin-right: 10px;">
                    <i class="material-icons">import_export</i>
                    <span>Export Excel</span>
                </a>

                <h2>
                    List
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="body">

                @include("admin.layouts.partials.message")

                <div class="show-hide-search">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="font-bold col-green">Name</div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="font-bold col-green">Email</div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="email" id="email">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="font-bold col-green">Phone</div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="phone" id="phone">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="font-bold col-green">Status</div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select name="status" id="status" class="form-control">
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
                            <div class="font-bold col-green">Date From</div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control datepicker" name="date_from"
                                        data-date-format="{!! JS_DATE !!}" id="date_from">
                                    <div id="date_from-container" style="position: relative"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="font-bold col-green">Date To</div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control datepicker" name="date_to"
                                        data-date-format="{!! JS_DATE !!}" id="date_to">
                                    <div id="date_to-container" style="position: relative"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="font-bold col-green">Search</div>
                            <div class="form-group form-float">
                                <a href="javascript:void(0)" class="btn btn-info waves-effect submit-search">
                                    <i class="material-icons">skip_next</i>
                                    <span>Submit</span>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-info waves-effect submit-reset">
                                    <i class="material-icons">refresh</i>
                                    <span>Reset</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="show-hide-export">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="font-bold col-green">Từ ngày</div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control datepicker" name="export_date_from"
                                        data-date-format="dd-mm-yyyy" id="export_date_from">
                                    <div id="export_date_from-container" style="position: relative"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="font-bold col-green">Đến ngày</div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control datepicker" name="export_date_to"
                                        data-date-format="dd-mm-yyyy" id="export_date_to">
                                    <div id="export_date_to-container" style="position: relative"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="font-bold col-green">Export Excel</div>
                            <a href="{{ route('loan.management.export.excel') }}" class="btn btn-warning waves-effect excel-export" style="margin-right: 10px;">
                                <i class="material-icons">import_export</i>
                                <span>Submit</span>
                            </a>
                        </div>
                    </div>
                </div>

                <table id="datatable" class="table table-bordered table-striped table-hover dataTable" style="width: 100%">
                    <thead>
                    <tr>
                        <th width="40">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th width="150">Action</th>
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
    <script type="text/javascript" src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <!--dataTables plugin-->
    <script src="/assets/plugins/jquery-datatable/jquery.dataTables.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js" type="text/javascript"></script>


    <script type="text/javascript" src="/assets/admin/js/pages/loan_management.index.js?v=1.0"></script>
@endsection