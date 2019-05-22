@extends('frontend.layouts.master')

@section('style')
    <style>
        .btn-link{
            text-transform: capitalize !important;
        }
    </style>
@endsection

@section('content')
    @if(!empty($blocks['HEAD']) && count($blocks['HEAD']))
    <div class="bannerInner" style="background-image:url({{$blocks['HEAD'][0]['photo']}});"><img src="{{$blocks['HEAD'][0]['photo']}}" alt="">
        <div class="container">
            <div class="bannerInner__inner">
                <div class="bannerInner__info">
                    <h3>{{$blocks['HEAD'][0]['name']}}</h3>
                    <p>{{$blocks['HEAD'][0]['description']}}</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(!empty($blocks['01']) && count($blocks['01']))
    <section class="liveInner dreamMain--2">
        <div class="container">
            <div class="liveInner__info">
                <div class="dreamInfo">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-16">
                            <div class="dreamInfo__des">
                                <h4>{{$blocks['01'][0]['name']}}</h4>
                                <p>{{$blocks['01'][0]['description']}}</p>
                            </div>
                        </div>
                        <div class="col-md-10 col-16">
                            <div class="dreamInfo__img" style="background-image:url({{$blocks['01'][0]['photo']}});">
                                <img src="{{$blocks['01'][0]['photo']}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(!empty($blocks['02']) && count($blocks['02']))
    <section class="liveInner bgblue liveInner--1">
        <div class="container">
            <div class="liveInner__info">
                <div class="dreamInfo">
                    <div class="row align-items-center">
                        <div class="col-md-9 col-16">
                            <div class="dreamInfo__img" style="background-image:url({{$blocks['02'][0]['photo']}});"><img src="{{$blocks['02'][0]['photo']}}" alt=""></div>
                        </div>
                        <div class="col-md-7 col-16">
                            <div class="dreamInfo__des">
                                <h4>{{$blocks['02'][0]['name']}}</h4>
                                <p>{{$blocks['02'][0]['description']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(!empty($blocks['03']) && count($blocks['03']))
    <section class="liveInner bggray liveInner--6">
        <div class="container">
            <div class="liveInner__info">
                <div class="dreamInfo">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-16">
                            <div class="dreamInfo__des">
                                <h4>{{$blocks['03'][0]['name']}}</h4>
                                <p>{{$blocks['03'][0]['description']}}</p>
                            </div>
                        </div>
                        <div class="col-md-10 col-16">
                            <div class="dreamInfo__img" style="background-image:url({{$blocks['03'][0]['photo']}});"><img src="{{$blocks['03'][0]['photo']}}" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(!empty($blocks['LINDEN']) && count($blocks['LINDEN']))
    <section class="liveInner--2">
        <div class="container">
            <div class="liveInner__info">
                <div class="simpleImg">
                    <div class="row">
                        <div class="col-md-3 col-16">
                            <div class="simpleImg__des">
                                <h4>{{$blocks['LINDEN'][0]['name']}}</h4><a class="btn-link" href="{{$blocks['LINDEN'][0]['url']}}">{{trans('button.view_more')}}</a>
                            </div>
                        </div>
                        <div class="col-md-13 col-16">
                            <p>{{$blocks['LINDEN'][0]['description']}}</p>
                            <div class="simpleImg__img" style="background-image:url({{$blocks['LINDEN'][0]['photo']}});"><img src="{{$blocks['LINDEN'][0]['photo']}}" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(!empty($blocks['TILIA']) && count($blocks['TILIA']))
    <section class="liveInner--3">
        <div class="container">
            <div class="liveInner__info">
                <div class="simpleImg">
                    <div class="row">
                        <div class="col-md-13 col-16">
                            <p>{{$blocks['TILIA'][0]['description']}}</p>
                            <div class="simpleImg__img" style="background-image:url({{$blocks['TILIA'][0]['photo']}});"><img src="{{$blocks['TILIA'][0]['photo']}}" alt=""></div>
                        </div>
                        <div class="col-md-3 col-16">
                            <div class="simpleImg__des">
                                <h4>{{$blocks['TILIA'][0]['name']}}</h4><a class="btn-link" href="{{$blocks['TILIA'][0]['url']}}">{{trans('button.view_more')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(!empty($blocks['COVE']) && count($blocks['COVE']))
    <section class="liveInner--4">
        <div class="container">
            <div class="liveInner__info">
                <div class="simpleImg">
                    <div class="row">
                        <div class="col-md-3 col-16">
                            <div class="simpleImg__des">
                                <h4>{{$blocks['COVE'][0]['name']}}</h4><a class="btn-link" href="{{$blocks['COVE'][0]['url']}}">{{trans('button.view_more')}}</a>
                            </div>
                        </div>
                        <div class="col-md-13 col-16">
                            <p>{{$blocks['COVE'][0]['description']}}</p>
                            <div class="simpleImg__img" style="background-image:url({{$blocks['COVE'][0]['photo']}});"><img src="{{$blocks['COVE'][0]['photo']}}" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(!empty($blocks['SLIDER']) && count($blocks['SLIDER']))
    <section class="liveInner--5">
        <div class="container">
            <div class="liveInner__info">
                <div class="sliderImg" id="SLIDER">
                    @foreach($blocks['SLIDER'][0]->children as $dr)
                        <div>
                            <div class="sliderImg__inner" style="background-image:url({{$dr->photo}});"><img
                                        src="{{$dr->photo}}" alt=""></div>
                        </div>
                    @endforeach
                </div>
                <div class="sliderNav" id="SLIDER-nav">
                    @foreach($blocks['SLIDER'][0]->children as $dr)
                        <div>
                            <div class="sliderNav__inner">
                                <h4>{{$dr->name}}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection

@section('script')

@endsection