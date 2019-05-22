@extends('frontend.layouts.master')

@section('content')

@if(!empty($blocks['ABOUT-VISION-MISSION-BANNER'][0]))
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! $blocks['ABOUT-VISION-MISSION-BANNER'][0]->photo !!}')" data-paroller-factor="0.4"
    data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <h1>{!! $blocks['ABOUT-VISION-MISSION-BANNER'][0]->name !!}</h1>
        
        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
@endif

@if(!empty($blocks['ABOUT-VISION-MISSION-OUR-VISION'][0]))
<section class="boxquote boxquote--4">
    <div class="container text-center">
        <h2 class="boxquote__head">{!! $blocks['ABOUT-VISION-MISSION-OUR-VISION'][0]->name !!}</h2>

        <div class="boxquote__content">
            {!! $blocks['ABOUT-VISION-MISSION-OUR-VISION'][0]->content !!}
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['ABOUT-VISION-MISSION-OUR-VISION'][0]) &&!empty($blocks['ABOUT-VISION-MISSION-OUR-VISION'][0]->children)) 
    @foreach($blocks['ABOUT-VISION-MISSION-OUR-VISION'][0]->children as $key => $block)
    <section class="vmRow" data-waypoint="70%">
        <div class="container">
            <div class="vmRow__img">
                <div class="vmRow__img__inner" style="background-image:url('{!! $block->photo !!}')">
                    <img src="{!! $block->photo !!}" alt="tam nhin">
                </div>
            </div>
            <div class="row">
                <div class="vmRow__content col-md-14 col-lg-12">
                    <div class="vmRow__line"></div>
                    <div class="vmRow__content__inner">
                        <div class="vmRow__icon">
                            <img src="{!! $block->icon !!}" alt="">
                        </div>
                        <div class="vmRow__text-wrap">
                            <h2 class="heading vmRow__heading">{!! $block->name !!}</h2>

                            <div class="vmRow__desc">{!! $block->description !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
@endif

@if(!empty($blocks['ABOUT-VISION-MISSION-OUR-CORE-VALUES'][0]))
<section class="values">
    <div class="container">
        <h2 class="heading">{!! $blocks['ABOUT-VISION-MISSION-OUR-CORE-VALUES'][0]->name !!}</h2>
    </div>
    <div class="container">
        @if(!empty($blocks['ABOUT-VISION-MISSION-OUR-CORE-VALUES'][0]->children)) 
            @foreach($blocks['ABOUT-VISION-MISSION-OUR-CORE-VALUES'][0]->children as $key => $block)
            <div class="value" data-waypoint="70%">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h3 class="value__head">
                            <img src="{!! $block->icon !!}" alt="" aria-label="E" style="margin-right: 0!important;">

                            <span>{!! $block->name !!}</span>
                        </h3>
                    </div>
                    <div class="col-md-10">
                        <h4 class="value__title">{!! $block->description !!}</h4>

                        <div class="value_desc">{!! $block->content !!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</section>
@endif

@if(!empty($blocks['ABOUT-VISION-CREATE-GENERAL-VALUES'][0]))
<section class="creatValue" data-waypoint="70%">
    <div class="container">
        <h2 class="heading">{!! $blocks['ABOUT-VISION-CREATE-GENERAL-VALUES'][0]->name !!}</h2>
    </div>
    <div class="creatValue__inner">
        <div class="creatValue__img">
            <div class="creatValue__img__inner" style="background-image:url('{!! $blocks['ABOUT-VISION-CREATE-GENERAL-VALUES'][0]->photo !!}')">
                <img src="{!! $blocks['ABOUT-VISION-CREATE-GENERAL-VALUES'][0]->photo !!}" alt="tao lap gia tri chung">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="creatValue__content">
                        <div class="creatValue__content__inner">
                            <div class="creatValue__content__desc">
                                {!! $blocks['ABOUT-VISION-CREATE-GENERAL-VALUES'][0]->content !!}
                            </div>
                            <a class="btn btn-danger btn-shadow creatValue__content__btn" href="{!! $blocks['ABOUT-VISION-CREATE-GENERAL-VALUES'][0]->url !!}">Xem thêm chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection