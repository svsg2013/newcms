@extends('frontend.layouts.master')

@section('style')
    <!-- Template's stylesheets -->
    <link rel="stylesheet" href="assets/frontend/js/megamenu/stylesheets/screen.css">
    <link rel="stylesheet" href="assets/frontend/css/theme-default.css" type="text/css">
    <link rel="stylesheet" href="assets/frontend/js/loaders/stylesheets/screen.css">
    <link rel="stylesheet" href="assets/frontend/css/corporate.css" type="text/css">
    <link rel="stylesheet" href="assets/frontend/fonts/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/frontend/fonts/Simple-Line-Icons-Webfont/simple-line-icons.css"
          media="screen"/>
    <link rel="stylesheet" href="assets/frontend/fonts/et-line-font/et-line-font.css">

    <link href="assets/frontend/js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="assets/frontend/js/tabs/css/responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" type="text/css" href="assets/frontend/js/cubeportfolio/cubeportfolio.min.css">
    <style>
        .resource-content img{
            max-width: 100%;
            display: block;
            margin: auto;
        }
    </style>
@endsection

@section('content')
    <section class="sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="ce-feature-box-3">
                        <div class="img-box">
                            <div class="postdate-box less-padd-1">
                                <div class="blog-post-info"><span><span
                                                class="icon-profile-male"></span> {{$resource->user->name}}</span></div>
                            </div>
                            <img src="{{$resource->image}}" alt="" class="img-responsive"/></div>
                        <div class="postinfo-box">
                            <h3 class="uppercase title font-weight-4 montserrat">{{$resource->title}}</h3>
                            <div class="blog-post-info"><span><i
                                            class="fa fa-user"></i> {{$resource->user->name}}</span> <span><i
                                            class="fa fa-clock-o"></i> {{format_show_time($resource->created_at)}}</span>
                            </div>
                            <br/>
                            <div class="resource-content">
                                {!! $resource->content !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 col-xs-12 section-white">
                    <div class="pages-sidebar-item">
                        <h5 class="uppercase pages-sidebar-item-title">{{trans('resource.lasted_posts')}}</h5>
                        @foreach($lasted_posts as $index=>$lasted_post)
                            @if($index)
                                <div class="divider-line solid light margin"></div>
                            @endif
                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <div class="imgbox-small left"><img style="height: 100%; object-fit: cover" src="{{$lasted_post->image}}" alt=""
                                                                    class="img-responsive"/></div>
                                <div class="text-box-right">
                                    <h6 class="uppercase nopadding" style="height: 46px;"><a href="{{route('resource.show',['slug'=>$lasted_post->slug])}}"
                                                                       class="text-hover-gyellow">{{summary($lasted_post->title,40)}}</a>
                                    </h6>
                                    <div class="blog-post-info padding-top-1">
                                        <span><i class="fa fa-user"></i> {{$lasted_post->user->name}}</span>
                                        <span><i class="fa fa-clock-o"></i> {{format_show_time($lasted_post->created_at)}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- end section -->
@endsection