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
                'form_method' =>  empty($news_tags) ? 'POST' : 'PUT',
                'form_url' => empty($news_tags) ? route('admin.news_tag.store') : route('admin.news_tag.update', $news_tags->id)
                ])
                     <!-- Nav tabs -->
                        @include('admin.translation.nav_tab', [
                            'object_trans' => $news_tags ?? null,
                            'default_tab' => $composer_locale,
                            'form_fields' => [
                                ['type' => 'text', 'name' => 'name'],
                                ['type' => 'text', 'name' => 'metaTitle'],
                                ['type' => 'text', 'name' => 'metaDescription']
                            ],
                            'translation_file' => 'admin_tags'
                        ])
                         <div class="form-group">
                             <input type="checkbox" name="active" value="1" id="active"
                             @if (empty($news_tags))
                                 {{'checked'}}
                                 @elseif (isset($news_tags) && $news_tags->active == 1)
                                 {{'checked'}}
                             @endif
                             >
                             <label for="active">Active</label>
                         </div>
                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.news_tag.index")
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