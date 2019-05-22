@extends("admin.layouts.master")

@section("meta")
    <meta name="linkGetBlock" content="{{ route('admin.product.load.block') }}"/>

    @if(!empty($product))
        <meta name="linkSortPhoto" content="{{ route('admin.product.photo.sort', $product->id) }}"/>
    @endif
@endsection

@section("style")
    <link rel="stylesheet" href="/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.css"/>
    <style>
        .module-item h4{
            display: none;
            margin-top: 0;
        }
        .module-item .collapsed + h4{
            display: block;
        }

        .module-items .module-item .module-items .module-item{
            border: 10px solid #4e93fc !important;
        }
    </style>
@endsection


@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">

                    @include("admin.layouts.partials.message")

                    @component('admin.layouts.components.form', [
                        'form_method' =>  empty($product) ? 'POST' : 'PUT',
                        'form_url' => empty($product) ? route("admin.product.store") : route("admin.product.update", $product->id)
                    ])
                        @include('admin.translation.nav_tab', [
                            'default_tabs' => [
                                [
                                    'id' => 'general',
                                    'name' => trans('admin_tab.general'),
                                    'path' => 'admin.product.partials.general'
                                ],
                                [
                                    'id' => 'photos',
                                    'name' => trans('admin_tab.photos'),
                                    'path' => 'admin.product.partials.photos'
                                ],
                                [
                                    'id' => 'blocks',
                                    'name' => trans('admin_tab.blocks'),
                                    'path' => 'admin.product.partials.blocks'
                                ]
                            ],
                            'object_trans' => $product ?? null,
                            'default_tab' => 'general',
                            'form_fields' => [
                                ['type' => 'text', 'name' => 'name'],
                                ['type' => 'textarea', 'name' => 'description'],
                                ['type' => 'ckeditor', 'name' => 'content']
                            ],
                            'form_plugins' => ['ckeditor'],
                            'tab_seo' => true,
                            'metadata' => $metadata ?? null,
                            'translation_file' => 'admin_product',
                        ])

                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.product.index")
                        ])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script src="/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js" type="text/javascript"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>

    @if($composer_locale !== 'en')
        <script type="text/javascript"
                src="/assets/plugins/jquery-validation/localization/messages_{{ $composer_locale }}.js"></script>
    @endif

    <script type="text/javascript" src="/assets/admin/js/pages/product.create.js?v=1.1"></script>
@endsection