@extends('frontend.layouts.master')

@section('style')
@endsection

@section('content')
    <div id="newsDetails">
        <div class="bannerInner bannerInner--newsDetails" style="background-image:url({{$news->image}});"><img
                    src="{{$news->image}}" alt="">
            <div class="container">
                <div class="bannerInner__inner">
                    <div class="bannerInner__info">
                        <h5>{{summary($news->title,100)}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="newsDetails">
            <div class="container">
                <div class="row newsDetails_wrap">
                    <div class="col-13">
                        <div class="btnBack"><a href="{{trans('routes.page_news')}}"> <span
                                        class="ic_arrow"></span><span>{{trans('news.back_to_news')}}</span></a></div>
                    </div>
                    <div class="col-10">
                        <h3 class="newsDetails_title">{{$news->title}}</h3>
                    </div>
                    <div class="col-12">
                        {!! $news->content !!}
                    </div>

                    <div class="col-12 btnWrap clearfix">
                        @if($relative_news['previous'])
                            <div class="btnPrev pull-left"><a
                                        href="{{route('news.show',['slug'=>$relative_news['previous']->slug])}}"> <span
                                            class="ic_arrow"></span><span>{{trans('button.previous')}}</span></a></div>
                        @endif

                        @if($relative_news['next'])
                            <div class="btnNext pull-right"><a
                                        href="{{route('news.show',['slug'=>$relative_news['next']->slug])}}">
                                    <span>{{trans('button.next')}}</span><span class="ic_arrow"></span></a></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection