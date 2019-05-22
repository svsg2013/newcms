@extends("admin.layouts.master")

@section("meta")

@endsection

@section("style")
    <!--select 2 plugin-->
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css"/>
@endsection


@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">

                    @include("admin.layouts.partials.message")

                    @component('admin.layouts.components.form', [
                        'form_method' =>  empty($data) ? 'POST' : 'PUT',
                        'form_url' => empty($data) ? route("admin.landing_partner.store") : route("admin.landing_partner.update", $data->id)
                    ])
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-green">{!! trans("admin_landing_partner.form.campaign_source") !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input required type="text" class="form-control" name="campaign_source" value="{!! old("campaign_source", $data->campaign_source ?? '')  !!}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-green">{!! trans("admin_landing_partner.form.template") !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        @php $old_template_code = old("template_code", $data->template_code ?? ''); @endphp
                                        <select {{ $old_template_code ? 'disabled' : '' }} id="template" class="form-control" name="template_code">
                                            <option value="">---</option>
                                            @foreach($templates as $template)
                                                <option {{ $old_template_code == $template->code ? "selected" : null }} value="{{ $template->code }}">{{ $template->name }} - {{ $template->code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" style="display: none">
                                <div class="font-bold col-green">{!! trans("admin_landing_partner.form.campaign_medium") !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="campaign_medium" value="{!! old("campaign_medium", $data->campaign_medium ?? '')  !!}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" style="display: none">
                                <div class="font-bold col-green">{!! trans("admin_landing_partner.form.campaign_name") !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="campaign_name" value="{!! old("campaign_name", $data->campaign_name ?? '')  !!}">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                                <div class="font-bold col-green">{!! trans("admin_landing_partner.form.name") !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input required type="text" class="form-control" name="name" value="{!! old("name", $data->name ?? '')  !!}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-green">{!! trans("admin_landing_partner.form.email") !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input required type="text" class="form-control" name="email" value="{!! old("email", $data->email ?? '')  !!}">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="font-bold col-green">{!! trans("admin_landing_partner.form.script_key") !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input required type="text" class="form-control" name="script_key" value="{!! old("script_key", $data->script_key ?? '')  !!}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="font-bold col-green">{!! trans("admin_landing_partner.form.script_content") !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea rows="5" type="text" class="form-control" name="script_content">{!! old("script_content", $data->script_content ?? '')  !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="checkbox" id="active" name="active"
                                           value="1" {!! old("active", $data->active ?? '') == 1 ? "checked" : null !!}>
                                    <label for="active">{!! trans("admin_landing_partner.form.active") !!}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="checkbox" id="otp_request" name="otp_request"
                                           value="1" {!! old("otp_request", $data->otp_request ?? '') == 1 ? "checked" : null !!}>
                                    <label for="otp_request">{!! trans("admin_landing_partner.form.otp_request") !!}</label>
                                </div>
                            </div>
                        </div>


                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.landing_partner.index"),
                            'link_preview' => !empty($data) && !empty($data->campaign_source) ? route('landing_partner', $data->campaign_source) : null
                        ])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <!--select 2 plugin-->
    <script src="/assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>

    @if($composer_locale !== 'en')
        <script type="text/javascript"
                src="/assets/plugins/jquery-validation/localization/messages_{{ $composer_locale }}.js"></script>
    @endif
    <script>
        jQuery(function($) {
            $.validator.addMethod(
                "regex",
                function(value, element, regexp) {
                    var re = new RegExp(regexp);
                    return this.optional(element) || re.test(value);
                },
                "Value invalid."
            );
        });
    </script>
    <script type="text/javascript" src="/assets/admin/js/pages/landing_partner.create.js?v=1.0"></script>
@endsection