@extends("admin.layouts.master")

@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">

                @include("admin.layouts.partials.message")

                @component('admin.layouts.components.form', [
                'form_method' =>  empty($website) ? 'POST' : 'PUT',
                'form_url' => empty($website) ? route("admin.website.store") : route("admin.website.update", $website->id)
                ])
                    <div class="row">
                        <div class="col-md-4">
                            <div class="font-bold col-green">Tên</div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" value="{{ $website->name ?? null }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="font-bold col-green">Active</div>
                            <div class="form-group">
                                <input type="checkbox" id="active" name="active"
                                    value="1" {!! !empty($website) && $website->active ? "checked" : null !!}>
                                <label for="active">Active</label>
                            </div>
                        </div>
                    </div>    

                    {{--Buttons--}}
                    @include("admin.layouts.partials.form_buttons", [
                        "cancel" => route("admin.website.index")
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

    <script type="text/javascript" src="/assets/admin/js/pages/website.create.js?v=1.0"></script>
@endsection