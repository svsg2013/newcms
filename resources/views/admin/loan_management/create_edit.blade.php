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
                    'form_url' => route("admin.loan.management.update", $loan_management->id)
                ])
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Name</div>
                                <div class="form-line focused">
                                    <input type="text" id="name" class="form-control" name="name" value="{{ $loan_management->name ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Email</div>
                                <div class="form-line focused">
                                    <input type="email" id="email" class="form-control" name="email" value="{{ $loan_management->email ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Phone</div>
                                <div class="form-line focused">
                                    <input type="text" id="phone" class="form-control" name="phone" value="{{ $loan_management->phone ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Loan Amount</div>
                                <div class="form-line focused">
                                    <input type="text" id="amount" class="form-control" name="amount" value="{{ $loan_management->amount ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Duration</div>
                                <div class="form-line focused">
                                    <input type="text" id="duration" class="form-control" name="duration" value="{{ $loan_management->duration ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Monthly Payment</div>
                                <div class="form-line focused">
                                    <input type="text" id="monthly_payment" class="form-control" name="monthly_payment" value="{{ $loan_management->monthly_payment ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Current Job</div>
                                <div class="form-line focused">
                                    <select id="job_id" class="js-example-basic-job-id form-control" name="job_id">
                                        <option value="">---</option>
                                        @foreach($loan_job as $key)
                                            <option value="{{ $key->id }}" {{ !empty($loan_management) && $loan_management->job_id == $key->id ? 'selected' : '' }}>{{ $key->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Combo</div>
                                <div class="form-line focused">
                                    <select id="combo_id" class="js-example-basic form-control" name="combo_id">
                                        <option value="">---</option>
                                        @foreach($combo as $key)
                                            <option value="{{ $key->id }}" {{ !empty($loan_management) && $loan_management->combo_id == $key->id ? 'selected' : '' }}>{{ $key->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">City</div>
                                <div class="form-line focused">
                                    <select id="city_id" class="js-example-basic form-control" name="city_id">
                                        <option value="">---</option>
                                        @foreach($city as $key)
                                            <option value="{{ $key->id }}" {{ !empty($loan_management) && $loan_management->city_id == $key->id ? 'selected' : '' }}>{{ $key->name }}</option>
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
                                    value="1" {!! !empty($loan_management) && $loan_management->active ? "checked" : null !!}>
                                <label for="active">Active</label>
                            </div>
                        </div>
                    </div>
                    
                    @include("admin.layouts.partials.form_buttons", [
                        "cancel" => route("admin.loan.management.index")
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

    <script type="text/javascript" src="/assets/admin/js/pages/loan_management.create.js?v=1.0"></script>

@endsection