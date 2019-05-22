@extends("admin.layouts.master")

@section("meta")

@endsection

@section("style")
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css" />
@endsection

@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">

                @include("admin.layouts.partials.message")

                @component('admin.layouts.components.form', [
                    'form_method' =>  empty($loan_setting) ? 'POST' : 'PUT',
                    'form_url' => empty($loan_setting) ? route("admin.loan.setting.store") : route("admin.loan.setting.update", $loan_setting->id)
                ])

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Lãi suất (%/năm)</div>
                                <div class="form-line focused">
                                    <input type="number" id="interest_rate" class="form-control" name="interest_rate" value="{{ $loan_setting->interest_rate ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Step</div>
                                <div class="form-line focused">
                                    <input type="text" id="step_money" class="form-control step_money" name="step_money" value="{{ $loan_setting->step_money ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Số tiền vay tối thiểu</div>
                                <div class="form-line focused">
                                    <input type="text" id="min_money" class="form-control min_money" name="min_money" value="{{ $loan_setting->min_money ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Số tiền vay tối đa</div>
                                <div class="form-line focused">
                                    <input type="text" id="max_money" class="form-control max_money" name="max_money" value="{{ $loan_setting->max_money ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Thời gian vay tối thiểu (tháng)</div>
                                <div class="form-line focused">
                                    <input type="number" id="min_borrow_time" class="form-control" name="min_borrow_time" value="{{ $loan_setting->min_borrow_time ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Thời gian vay tối đa (tháng)</div>
                                <div class="form-line focused">
                                    <input type="number" id="max_borrow_time" class="form-control" name="max_borrow_time" value="{{ $loan_setting->max_borrow_time ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Hệ số công thức</div>
                                <div class="form-line focused">
                                    <input type="number" id="coefficient" class="form-control" name="coefficient" value="{{ $loan_setting->coefficient ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Nghề nghiệp</div>
                                <div class="form-line focused">
                                    <select id="loan_job_id" class="form-control" name="loan_job_id">
                                        @foreach($loan_job as $key)
                                            <option value="{{ $key->id }}" {{ !empty($array_loan_job_id) && in_array($key->id, $array_loan_job_id) ? 'selected' : '' }}>{{ $key->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Loại thu nhập cho vay</div>
                                <div class="form-line focused">
                                    <select id="loan_income_type_id" class="form-control" name="loan_income_type_id">
                                        @foreach($loan_income_type as $key)
                                            <option value="{{ $key->id }}" {{ !empty($array_loan_income_type_id) && in_array($key->id, $array_loan_income_type_id) ? 'selected' : '' }}>{{ $key->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Template ID</div>
                                <div class="form-line focused">
                                    <input type="text" id="template_id" class="form-control" name="template_id" value="{{ $loan_setting->template_id ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Partner ID</div>
                                <div class="form-line focused">
                                    <input type="text" id="partner_id" class="form-control" name="partner_id" value="{{ $loan_setting->partner_id ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @include("admin.layouts.partials.form_buttons", [
                        "cancel" => route("admin.loan.setting.index")
                    ])
                @endcomponent
                </div>
            </div>
        </div>
    </div>

    
@endsection

@section("script")

    <script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>

    @if($composer_locale !== 'en')
        <script type="text/javascript" src="/assets/plugins/jquery-validation/localization/messages_{{ $composer_locale }}.js"></script>
    @endif

    <script src="/assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <script src="/assets/plugins/cleave/cleave.min.js"></script>

    <script type="text/javascript" src="/assets/admin/js/pages/loan_setting.create.js?v=1.0"></script>

@endsection