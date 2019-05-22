@extends('frontend.layouts.master')

@section('style')
    <style>
        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
        }

        .pagination > li {
            display: inline;
        }

        .pagination > li > a, .pagination > li > span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #337ab7;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <div id="news">
        @if(!empty($blocks['HEAD']) && count($blocks['HEAD']))
            <div class="bannerInner bannerInner--news" style="background-image:url({{$blocks['HEAD'][0]['photo']}});">
                <img src="{{$blocks['HEAD'][0]['photo']}}">
                <div class="container">
                    <div class="bannerInner__inner">
                        <div class="bannerInner__info">
                            <div class="bannerInner__info--2">
                                <h1>{{$blocks['HEAD'][0]['name']}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($news['first_news']))
            <div class="newsTitle bg-dark">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-9 col-16 newsTitle_image"><a
                                    href="{{route('news.show',['slug'=>$news['first_news']['slug']])}}"
                                    style="background-image:url({{$news['first_news']->image}});"><img
                                        src="{{$news['first_news']->image}}" alt=""></a></div>
                        <div class="col-md-7 col-16 newsTitle_content"><span
                                    class="newsTitle_content__date">{{format_show_time($news['first_news']->created_at)}}</span>
                            <h3 class="newsTitle_content__title"><a
                                        href="{{route('news.show',['slug'=>$news['first_news']['slug']])}}">{{$news['first_news']->title}}</a>
                            </h3>
                            <div class="readMore"><a
                                        href="{{route('news.show',['slug'=>$news['first_news']['slug']])}}"> <span
                                            class="readMore_text"> {{trans('button.read_more')}}</span><span
                                            class="readMore_arrow"></span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="newsList bg-blue-2">
            <div class="container">
                <div class="newsList__wapper">
                    @foreach($news['list_news'] as $n)
                    <div class="row">
                        <div class="col-xl-6 col-lg-9 col-md-9 col-16 newsList_image"><a href="{{route('news.show',['slug'=>$n->slug])}}" style="background-image:url({{$n->image}});"><img src="{{$n->image}}" alt=""></a></div>
                        <div class="col-xl-10 col-lg-7 col-md-7 col-16 newsList_content right"><span class="newsList_content__date">{{format_show_time($n->created_at)}}</span>
                            <h3 class="newsList_content__title"><a href="{{route('news.show',['slug'=>$n->slug])}}">{{$n->title}}</a></h3>
                            <div class="readMore readMore--v1"><a href="{{route('news.show',['slug'=>$n->slug])}}"> <span>{{trans('button.read_more')}}</span><span class="ic_arrow"></span></a></div>
                        </div>
                    </div>
                    @endforeach

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="text-center">{{$news['list_news']->links()}}</div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection