@extends("admin.layouts.master")

@section("meta")

@endsection

@section("style")

@endsection

@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">

                @include("admin.layouts.partials.message")

                @component('admin.layouts.components.form', [
                    'form_method' =>  empty($document) ? 'POST' : 'PUT',
                    'form_url' => empty($document) ? route("admin.document.store") : route("admin.document.update", $document->id)
                ])
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group form-float">
                                <div class="font-bold col-green">Name</div>
                                <div class="form-line focused">
                                    <input type="text" id="name" class="form-control" name="name" value="{{ $document->name ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="checkbox" id="active" name="active"
                                    value="1" {!! !empty($document) && $document->active ? "checked" : null !!}>
                                <label for="active">Active</label>
                            </div>
                        </div>
                    </div>
                    
                    @include("admin.layouts.partials.form_buttons", [
                        "cancel" => route("admin.document.index")
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

    <script type="text/javascript" src="/assets/admin/js/pages/document.create.js?v=1.0"></script>

@endsection