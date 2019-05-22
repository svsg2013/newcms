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
                'form_method' =>  empty($news_category) ? 'POST' : 'PUT',
                'form_url' => empty($news_category) ? route("admin.news_category.store") : route("admin.news_category.update", $news_category->id)
                ])
                        <div class="row">
                            <!-- <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="font-bold col-green">{{ trans('admin_news_category.form.code') }}</div>
                                    <div class="form-line focused">
                                        <input type="text" id="code" class="form-control" name="code" value="{{ $news_category->code ?? '' }}">
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="font-bold col-green">{{ trans('admin_news_category.form.pages') }}</div>
                                    <div class="form-line focused">
                                        <select id="code" class="form-control" name="code">
                                            @foreach($news_page_type as $key => $value)
                                                <option {{ (!empty($news_category) && ($news_category->code == $key)) ? "selected" : "" }} value="{{ $key }}">{{ trans('admin_news_category.form.news_page_type.'.$key)  }}</option>
                                            @endforeach
                                          
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 parentBox">
                                <div class="form-group form-float">
                                    <div class="font-bold col-green">{{ trans('admin_news_category.form.parent') }}</div>
                                    <div class="form-line focused">
                                        <select class="form-control" name="parent_id">
                                                <option value="">{{ trans('admin_news_category.form.not_parent') }}</option>
                                            @foreach($parent_news_categories as $parent_news_category)
                                                <option {{ (!empty($news_category) && ($news_category->parent_id == $parent_news_category->id)) ? "selected" : "" }} value="{{ $parent_news_category->id }}">{{ $parent_news_category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Nav tabs -->
                        @include('admin.translation.nav_tab', [
                            'object_trans' => $news_category ?? null,
                            'default_tab' => $composer_locale,
                            'form_fields' => [
                                ['type' => 'text', 'name' => 'name']
                            ],
                            'translation_file' => 'admin_news_category'
                        ])

                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.news_category.index")
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

    <script type="text/javascript" src="/assets/admin/js/pages/news_category.create.js?v=1.0"></script>

    @php
        $single_menu =  json_encode(config('constants.single_menu'), JSON_UNESCAPED_SLASHES);
    @endphp

    <script>

        $('#code').change(function(){
            var code = $(this).val();
            var single_menu = JSON.parse('{!! $single_menu !!}');
            var flag = false
            single_menu.forEach(function($q){
                if($q == code){
                    flag = true
                }
            })
            
            if(flag){
                $('.parentBox').addClass('hidden')
            }else{
                $('.parentBox').removeClass('hidden')
            }
            
        
        })
    
    </script>
@endsection