@extends('frontend.layouts.master')

@section('style')

@endsection

@section('content')
    <div id="live">
        <section class="slider">
            <div class="slider__wrapper">
                @foreach($slider as $sl)
                    <div class="slider__wrapper__item">
                        <div class="slider__wrapper__item__image" style="background-image: url('{{$sl->image}}');"><img
                                    src="{{$sl->image}}" alt="">
                            <div class="container">
                                <div class="slider__wrapper__item__title">
                                    <div class="slider__wrapper__item__title__wrap">
                                        <h1><span>{{$sl->name}}</span></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        @if(!empty($blocks['B02']) && count($blocks['B02']))
            @if(!empty($blocks['B01']) && count($blocks['B01']))
                <div class="livePlace bg-dark clearfix">
                    <div class="container clearfix">
                        <div class="livePlace_bg clearfix"
                             style="background-image:url({{$blocks['B01'][0]['photo']}});">
                            <h3>{!! $blocks['B01'][0]['name'] !!}</h3><img src="{{$blocks['B01'][0]['photo']}}">
                        </div>
                        <div class="livePlace_content clearfix">
                            <p>{!! $blocks['B01'][0]['description'] !!}</p>
                            <p class="text-white"> {!! $blocks['B01'][0]['url'] !!}</p>
                        </div>
                        <div class="livePlace_title">
                            <h2>{!! $blocks['B02'][0]['name'] !!}</h2>
                        </div>
                    </div>
                </div>
            @endif
            <div class="liveLocation">
                <div class="container">
                    <div class="liveLocation_bg clearfix" style="background-image:url({{$blocks['B02'][0]['photo']}});">
                        <img src="{{$blocks['B02'][0]['photo']}}" atl=""></div>
                    <div class="liveLocation_content">
                        <h3>{!! $blocks['B02'][0]['description'] !!}</h3>
                        <p>{!! $blocks['B02'][0]['content'] !!}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($blocks['LIVE']) && count($blocks['LIVE']))
            <div class="livePost">
                <div class="container">
                    <div class="row">
                        <div class="col-11">
                            <div class="livePost_bg">
                                <a href="{{$blocks['LIVE'][0]['url']}}"
                                   style="background-image:url({!! $blocks['LIVE'][0]['photo'] !!});">
                                    <img src="{!! $blocks['LIVE'][0]['photo'] !!}"
                                         alt="{!! $blocks['LIVE'][0]['name'] !!}">
                                </a>
                                <h1>{!! $blocks['LIVE'][0]['name'] !!}</h1>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="livePost_content">
                                <p>{!! $blocks['LIVE'][0]['description'] !!}</p>
                                <div class="readMore"><a href="{{$blocks['LIVE'][0]['url']}}"> <span
                                                class="readMore_text">{{trans('live.live_button')}}</span>
                                        <span class="readMore_arrow"></span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($blocks['WORK']) && count($blocks['WORK']))
            <div class="livePost livePost--blue">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="livePost_content livePost_content--mgtop">
                                <p>{!! $blocks['WORK'][0]['description'] !!}</p>
                                <div class="readMore">
                                    <a href="{{$blocks['WORK'][0]['url']}}">
                                        <span class="readMore_text">{{trans('live.work_button')}}</span>
                                        <span class="readMore_arrow"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="livePost_bg livePost_bg--mgtop">
                                <a href="{{$blocks['WORK'][0]['url']}}"
                                   style="background-image:url({!! $blocks['WORK'][0]['photo'] !!});">
                                    <img src="{!! $blocks['WORK'][0]['photo'] !!}" alt="">
                                </a>
                                <h1>{!! $blocks['WORK'][0]['name'] !!}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($blocks['PLAY']) && count($blocks['PLAY']))
            <div class="livePost">
                <div class="container">
                    <div class="row">
                        <div class="col-11">
                            <div class="livePost_bg">
                                <a href="#" style="background-image:url({!! $blocks['PLAY'][0]['photo'] !!});">
                                    <img src="{!! $blocks['PLAY'][0]['photo'] !!}" alt="">
                                </a>
                                <h1>{!! $blocks['PLAY'][0]['name'] !!}</h1>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="livePost_content">
                                <p>{!! $blocks['PLAY'][0]['description'] !!}</p>
                                <div class="readMore">
                                    <a href="{{$blocks['PLAY'][0]['url']}}">
                                        <span class="readMore_text">{{trans('live.play_button')}}</span>
                                        <span class="readMore_arrow"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($blocks['DREAM']) && count($blocks['DREAM']))
            <div class="livePost livePost--blue livePost--margin">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="livePost_content">
                                <p>{!! $blocks['DREAM'][0]['description'] !!}</p>
                                <div class="readMore"><a href="{{$blocks['DREAM'][0]['url']}}"> <span
                                                class="readMore_text">{{trans('live.dream_button')}}</span><span
                                                class="readMore_arrow"></span></a></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="livePost_bg" >
                                <a href="{{trans('routes.page_dream')}}" style="background-image:url({!! $blocks['DREAM'][0]['photo'] !!});">
                                    <img src="{!! $blocks['DREAM'][0]['photo'] !!}" alt="">
                                </a>
                                <h1>{!! $blocks['DREAM'][0]['name'] !!}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection

@section('script')
    <script>
        $('.arrow').click(function (e) {
           e.preventDefault();
        });
    </script>
@endsection