@extends('frontend.layouts.master')

@section('content')
<title>Easy Credit - Thành tựu</title>
@if(!empty($blocks['ABOUT-OUR-ACHIEVMENT-BANNER'][0]))
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! $blocks['ABOUT-OUR-ACHIEVMENT-BANNER'][0]->photo !!}')" data-paroller-factor="0.4"
    data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <!-- <h1>Thành tựu</h1> -->
        <h1>{!! $blocks['ABOUT-OUR-ACHIEVMENT-BANNER'][0]->name !!}</h1>
        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
@endif

@if(!empty($blocks['ABOUT-OUR-ACHIEVMENT-GENERAL'][0]))
<section class="boxquote">
    <div class="container text-center">
        <h2 class="boxquote__head">{!! $blocks['ABOUT-OUR-ACHIEVMENT-GENERAL'][0]->description !!}</h2>

        <div class="boxquote__content">{!! $blocks['ABOUT-OUR-ACHIEVMENT-GENERAL'][0]->content !!}</div>
    </div>
</section>
@endif

<section class="achievementTop" data-waypoint="70%">
    <div class="container">
        <div class="achievementTop__img">
            <a style="background-image:url('{{ !empty($achievements_top[0]) ? $achievements_top[0]->image : '' }}')" href="{{ route('frontend.achievements.show', !empty($achievements_top[0]) ? $achievements_top[0]->slug : '') }}">
                <img src="{{ !empty($achievements_top[0]) ? $achievements_top[0]->image : '' }}" alt="">
            </a>
        </div>
        <div class="achievementTop__content">
            <div class="achievementTop__content__inner">
                <h2 class="achievementTop__title">
                    <a href="{{ route('frontend.achievements.show', !empty($achievements_top[0]) ? $achievements_top[0]->slug : '') }}" title="Thành tựu Đặc biệt">Thành tựu Đặc biệt</a>
                </h2>
                <span class="achievementTop__meta">{{ !empty($achievements_top[0]) ? $achievements_top[0]->publish_at : '' }}</span>
                <div class="achievementTop__desc">{{ !empty($achievements_top[0]) ? $achievements_top[0]->description : '' }}</div>
                <div class="achievementTop__btn">
                    <a class="btn btn-primary btn-sm btn-block btn-shadow" href="{{ route('frontend.achievements.show', !empty($achievements_top[0]) ? $achievements_top[0]->slug : '') }}" title="Xem thêm">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="achievementRow">
    <div class="container">
        <div class="achievementRow__content">
            <div class="achievementRow__content__inner">
                @if(!empty($achievements))
                @foreach($achievements as $key)
                <div class="achievementRow__item" data-waypoint="70%">
                    <div class="achievementRow__item__inner">
                        <div class="achievementRow__item__imgWrap">
                            <div class="achievementRow__item__img">
                                <a style="background-image:url('{{ $key->image }}')" href="{{ route('frontend.achievements.show', $key->slug) }}">
                                    <img src="{{ $key->image }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="achievementRow__item__content">
                            <h3 class="achievementRow__item__title">
                                <a href="{{ route('frontend.achievements.show', $key->slug) }}" title="{{ $key->title }}">{{ $key->title }}</a>
                            </h3>
                            <span class="achievementRow__item__meta">{{ $key->publish_at }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

@if(!empty($blocks['ABOUT-OUR-ACHIEVMENT-FOOTER'][0]))
<section class="getStarted" style="background-image: url('{!! $blocks['ABOUT-OUR-ACHIEVMENT-FOOTER'][0]->photo !!}')" data-waypoint="70%" data-paroller-factor="0.4"
    data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container">
        <h2 class="heading heading--white">{!! $blocks['ABOUT-OUR-ACHIEVMENT-FOOTER'][0]->name !!}</h2>
        <div class="text-center">
            <a class="btn btn-danger btn-shadow btn-lg" href="{!! $blocks['ABOUT-OUR-ACHIEVMENT-FOOTER'][0]->url !!}">gia nhập ngay</a>
        </div>
    </div>
</section>
@endif

@endsection