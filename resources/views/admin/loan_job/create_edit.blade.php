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
                    'form_method' =>  empty($loan_job) ? 'POST' : 'PUT',
                    'form_url' => empty($loan_job) ? route("admin.loan.job.store") : route("admin.loan.job.update", $loan_job->id)
                ])
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Name</div>
                                <div class="form-line focused">
                                    <input type="text" id="name" class="form-control" name="name" value="{{ $loan_job->name ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Xét chứng minh thu nhập</div>
                                <div class="form-line focused">
                                    <select id="combo_id" class="js-example-basic form-control" name="combo_id[]" multiple="multiple">
                                        <option value="">---</option>
                                        @foreach($combo as $key)
                                            <option value="{{ $key->id }}" {{ !empty($array_combo) && in_array($key->id ,$array_combo) ? 'selected' : '' }}>{{ $key->name }}</option>
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
                                    value="1" {!! !empty($loan_job) && $loan_job->active ? "checked" : null !!}>
                                <label for="active">Active</label>
                            </div>
                        </div>
                    </div>
                    
                    @include("admin.layouts.partials.form_buttons", [
                        "cancel" => route("admin.loan.job.index")
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

    <script type="text/javascript" src="/assets/admin/js/pages/loan_job.create.js?v=1.0"></script>

@endsection