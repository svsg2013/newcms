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
                    'form_method' => 'PUT',
                    'form_url' => route("admin.landing_customer.update", $data->id)
                ])
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Name</div>
                                <div class="form-line focused">
                                    <input type="text" id="name" class="form-control" name="fullname" value="{{ old('fullname', $data->fullname ?? '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Email</div>
                                <div class="form-line focused">
                                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email', $data->email ?? '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Phone</div>
                                <div class="form-line focused">
                                    <input type="text" id="phone" class="form-control" name="phonenumber" value="{{ old('phonenumber', $data->phonenumber ?? '') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Loan Amount</div>
                                <div class="form-line focused">
                                    <input type="text" id="amount" class="form-control" name="loan_amount" value="{{ old('loan_amount', $data->loan_amount ?? '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Duration</div>
                                <div class="form-line focused">
                                    <input type="text" id="duration" class="form-control" name="duration" value="{{ old('duration', $data->duration ?? '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Monthly Payment</div>
                                <div class="form-line focused">
                                    <input type="text" id="monthly_payment" class="form-control" name="monthly_payment" value="{{ old('monthly_payment', $data->monthly_payment ?? '') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Career</div>
                                <div class="form-line focused">
                                    <select id="career_id" class="js-example-basic-job-id form-control" name="career_id">
                                        <option value="">---</option>
                                        @foreach($careers as $career)
                                            <option value="{{ $career->id }}" {{ old('career_id', $data->career_id ?? '') == $career->id ? 'selected' : '' }}>{{ $career->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Loan</div>
                                <div class="form-line focused">
                                    <select id="loan_id" class="js-example-basic form-control" name="loan_id">
                                        <option value="">---</option>
                                        @foreach($loans as $loan)
                                            <option value="{{ $loan->id }}" {{ old('loan_id', $data->loan_id ?? '') == $loan->id ? 'selected' : '' }}>{{ $loan->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">District</div>
                                <div class="form-line focused">
                                    <select id="district_id" class="js-example-basic form-control" name="district_id">
                                        <option value="">---</option>
                                        @foreach($districts as $district)
                                            <option value="{{ $district->id }}" {{ old('district_id', $data->district_id ?? '') == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="checkbox" id="active" name="active"
                                    value="1" {!! old('active', $data->active ?? '') == 1 ? "checked" : null !!}>
                                <label for="active">Active</label>
                            </div>
                        </div>
                    </div>
                    
                    @include("admin.layouts.partials.form_buttons", [
                        "cancel" => route("admin.landing_customer.index")
                    ])
                @endcomponent
                </div>
            </div>
        </div>
    </div>

    
@endsection

@section("script")
    <!-- Jquery Validation Plugin Css -->
    <script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>

    @if($composer_locale !== 'en')
        <script type="text/javascript"
                src="/assets/plugins/jquery-validation/localization/messages_{{ $composer_locale }}.js"></script>
    @endif

    <script src="/assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <script src="/assets/plugins/cleave/cleave.min.js"></script>

    <script type="text/javascript" src="/assets/admin/js/pages/landing_customer.create.js?v=1.0"></script>

@endsection