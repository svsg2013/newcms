@extends('frontend.layouts.master')

@section('content')
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! !empty($blocks['ABOUT-INTRODUCTION-BANNER'][0]) ? $blocks['ABOUT-INTRODUCTION-BANNER'][0]->photo : '' !!}')" data-paroller-factor="0.4"
    data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <h1>{!! !empty($blocks['ABOUT-INTRODUCTION-BANNER'][0]) ? $blocks['ABOUT-INTRODUCTION-BANNER'][0]->name : '' !!}</h1>
        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
<section class="boxquote">
    <div class="container text-center">
        <h2 class="boxquote__head">
            <span>{!! !empty($blocks['ABOUT-INTRODUCTION-WELCOME'][0]) ? $blocks['ABOUT-INTRODUCTION-WELCOME'][0]->name : '' !!}</span>
        </h2>
        <div class="boxquote__content">
            {!! !empty($blocks['ABOUT-INTRODUCTION-WELCOME'][0]) ? $blocks['ABOUT-INTRODUCTION-WELCOME'][0]->description : '' !!}
        </div>
    </div>
</section>
<section class="aboutIntro">
    <div class="container container--about">
        <h2 class="heading">{!! !empty($blocks['ABOUT-INTRODUCTION-OVERVIEW'][0]) ? $blocks['ABOUT-INTRODUCTION-OVERVIEW'][0]->description : '' !!}</h2>

        {!! !empty($blocks['ABOUT-INTRODUCTION-OVERVIEW'][0]) ? $blocks['ABOUT-INTRODUCTION-OVERVIEW'][0]->content : '' !!}
    </div>
</section>
<section class="aboutRow" data-waypoint="70%">
    <div class="aboutRow__image">
        <div class="aboutRow__image__inner" style="background-image: url('{!! $blocks['ABOUT-INTRODUCTION-WHO-WE-ARE'][0]->photo !!}')">
            <img src="/images/about/chung-toi-la-ai.jpg" alt="">
        </div>
    </div>
    <div class="container container--about">
        <div class="aboutRow__content">
            <div class="aboutRow__content__inner">
                <div class="aboutRow__line">
                    <span></span>
                </div>
                <div class="aboutRow__content__inner__desc">
                    <h2 class="heading">{!! !empty($blocks['ABOUT-INTRODUCTION-WHO-WE-ARE'][0]) ? $blocks['ABOUT-INTRODUCTION-WHO-WE-ARE'][0]->description : '' !!}</h2>

                    {!! !empty($blocks['ABOUT-INTRODUCTION-WHO-WE-ARE'][0]) ? $blocks['ABOUT-INTRODUCTION-WHO-WE-ARE'][0]->content : '' !!}
                </div>
            </div>
        </div>
    </div>
</section>
<section class="aboutRow" data-waypoint="70%">
    <div class="aboutRow__image">
        <div class="aboutRow__image__inner" style="background-image: url('{!! $blocks['ABOUT-INTRODUCTION-DIFFERENT'][0]->photo !!}')">
            <img src="/images/about/dieu-gi-khac-biet.jpg" alt="">
        </div>
    </div>
    <div class="container container--about">
        <div class="aboutRow__content">
            <div class="aboutRow__content__inner">
                <div class="aboutRow__line">
                    <span></span>
                </div>
                <div class="aboutRow__content__inner__desc">
                    <h2 class="heading">{!! !empty($blocks['ABOUT-INTRODUCTION-DIFFERENT'][0]) ? $blocks['ABOUT-INTRODUCTION-DIFFERENT'][0]->description : '' !!}</h2>

                    {!! !empty($blocks['ABOUT-INTRODUCTION-DIFFERENT'][0]) ? $blocks['ABOUT-INTRODUCTION-DIFFERENT'][0]->content : '' !!}
                </div>
            </div>
        </div>
    </div>
</section>
<section class="aboutMilestone">
    <div class="container container--about">
        <!-- <h2 class="heading">Cột mốc
            <strong>Phát triển</strong>
        </h2> -->
        <h2 class="heading">{!! !empty($blocks['ABOUT-INTRODUCTION-HISTORY'][0]) ? $blocks['ABOUT-INTRODUCTION-HISTORY'][0]->description : '' !!}</h2>

        <!-- <p>Mục tiêu chính của chúng tôi là cung cấp cho khách hàng một hành trình liên tục với thủ tục nhanh chóng và dễ dàng
            nhất khi đăng ký vay. Chúng tôi muốn cạnh tranh với các hình thức kinh doanh truyền thống gồm vay thế chấp và
            vay nặng lãi, bằng giải pháp hỗ trợ tài chính tối ưu cho khách hàng mà họ xứng đáng nhận được.</p> -->
        {!! !empty($blocks['ABOUT-INTRODUCTION-HISTORY'][0]) ? $blocks['ABOUT-INTRODUCTION-HISTORY'][0]->content : '' !!}
    </div>
    <div class="milestone">
        <div class="container">
            @if(!empty($blocks['ABOUT-INTRODUCTION-HISTORY'][0]) && !empty($blocks['ABOUT-INTRODUCTION-HISTORY'][0]->children)) 
                @foreach($blocks['ABOUT-INTRODUCTION-HISTORY'][0]->children as $key => $block)
                <div class="milestone__item" data-waypoint="60%">
                    <div class="milestone__item__icon">
                        <img src="{!! $block->icon !!}" alt="">
                    </div>
                    <div class="milestone__item__line">
                        <span></span>
                    </div>
                    <div class="milestone__item__year">
                        <span>
                            <b>{!! $block->name !!}</b>
                        </span>
                    </div>
                    <!-- <div class="milestone__item__desc">Ra mắt EASY CREDIT tại các thành phố và tỉnh thành khu vực phía Nam của Việt Nam. </div> -->
                    <div class="milestone__item__desc">{!! $block->description !!}</div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
<section class="aboutExecutive">
    <div class="container container--about">
        <!-- <h2 class="heading">
            <strong>HÃY GẶP BAN ĐIỀU HÀNH </strong>CỦA CHÚNG TÔI</h2> -->
        <h2 class="heading">{!! !empty($blocks['ABOUT-INTRODUCTION-LEADERS'][0]) ? $blocks['ABOUT-INTRODUCTION-LEADERS'][0]->description : '' !!}</h2>
            
        <div class="exePeople">
            @if(!empty($blocks['ABOUT-INTRODUCTION-LEADERS'][0]) && !empty($blocks['ABOUT-INTRODUCTION-LEADERS'][0]->children)) 
                @foreach($blocks['ABOUT-INTRODUCTION-LEADERS'][0]->children as $key => $block)
                <div class="exePeople__item">
                    <div class="exePeople__item__img">
                        <div class="exePeople__item__img__inner" style="background-image:url('{!! $block->photo !!}')">
                            <img src="{!! $block->photo !!}" alt="">
                        </div>
                    </div>
                    <div class="exePeople__item__content">
                        <!-- <h3>lorem ipsum</h3> -->
                        <h3>{!! $block->name !!}</h3>

                        <!-- <p>Giám Đốc Marketing</p> -->
                        <p>{!! $block->description !!}</p>
                        <span class="exePeople__item__line"></span>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        <div class="exePeopleDesc">
            @if(!empty($blocks['ABOUT-INTRODUCTION-LEADERS'][0]) && !empty($blocks['ABOUT-INTRODUCTION-LEADERS'][0]->children)) 
                @foreach($blocks['ABOUT-INTRODUCTION-LEADERS'][0]->children as $key => $block)
                <div class="exePeopleDesc__item">
                    <div class="exePeopleDesc__item__quote">{!! $block->content !!}</div>

                    <h3>{!! $block->name !!}</h3>
                    <span class="exePeopleDesc__item__line"></span>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
@endsection