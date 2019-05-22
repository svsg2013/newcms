@extends("admin.layouts.master")

@section("meta")

@endsection

@section("style")
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css"/>
@endsection

@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">

                @include("admin.layouts.partials.message")

                @component('admin.layouts.components.form', [
                    'form_method' =>  empty($combo) ? 'POST' : 'PUT',
                    'form_url' => empty($combo) ? route("admin.combo.store") : route("admin.combo.update", $combo->id)
                ])
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Name</div>
                                <div class="form-line focused">
                                    <input type="text" id="name" class="form-control" name="name" value="{{ $combo->name ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Document</div>
                                <div class="form-line focused">
                                    <select id="document_id" class="js-example-basic-multiple form-control" name="document_id[]" multiple="multiple">
                                        @foreach($document as $key)
                                            <option value="{{ $key->id }}" {{ !empty($array_document) && in_array($key->id ,$array_document) ? 'selected' : '' }}>{{ $key->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Loan Income Type</div>
                                <div class="form-line focused">             
                                    <select id="loan_income_type_id" class="js-example-basic form-control" name="loan_income_type_id">
                                        @foreach($loan_income_type as $key)
                                            <option value="{{ $key->id }}" {{ !empty($combo) && $combo->loan_income_type_id == $key->id ? 'selected' : '' }}>{{ $key->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="checkbox" id="active" name="active"
                                    value="1" {!! !empty($combo) && $combo->active ? "checked" : null !!}>
                                <label for="active">Active</label>
                            </div>
                        </div>
                    </div>
                    
                    @include("admin.layouts.partials.form_buttons", [
                        "cancel" => route("admin.combo.index")
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

    <script type="text/javascript" src="/assets/admin/js/pages/combo.create.js?v=1.0"></script>

@endsection