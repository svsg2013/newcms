@extends('frontend.layouts.master')

@section('content')

<!-- Start breadcrumbs-->
@if(!empty($blocks['SOLUTION-LOAN-PROCEDURE-BANNER'][0]))
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! $blocks['SOLUTION-LOAN-PROCEDURE-BANNER'][0]->photo !!}')" data-paroller-factor="0.4"
    data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <!-- <h1>Thủ tục vay</h1> -->
        <h1>{!! $blocks['SOLUTION-LOAN-PROCEDURE-BANNER'][0]->name !!}</h1>

        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
@endif
<!-- End breadcrumbs-->

@if(!empty($blocks['SOLUTION-LOAN-PROCEDURE-GENERAL'][0]))
<section class="boxquote boxquote--2">
    <div class="container text-center">
        <h2 class="boxquote__head">
            {!! $blocks['SOLUTION-LOAN-PROCEDURE-GENERAL'][0]->name !!}
        </h2>

        <div class="boxquote__content">
            {!! $blocks['SOLUTION-LOAN-PROCEDURE-GENERAL'][0]->content !!}
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['SOLUTION-LOAN-PROCEDURE-APPLY'][0]))
<section class="guideRegister">
    <h2 class="heading">
        {!! $blocks['SOLUTION-LOAN-PROCEDURE-APPLY'][0]->name !!}
        <small>
            {!! $blocks['SOLUTION-LOAN-PROCEDURE-APPLY'][0]->description !!}
        </small>
    </h2>
    <div class="container">
        <div class="steps">
            @if(!empty($blocks['SOLUTION-LOAN-PROCEDURE-APPLY'][0]->children)) 
            @foreach($blocks['SOLUTION-LOAN-PROCEDURE-APPLY'][0]->children as $key => $block)
            <div class="steps__item" data-waypoint="70%">
                <div class="steps__item__num">
                    <span>{!! $key + 1 !!}</span>
                </div>
                <div class="steps__item__content">
                    <div class="steps__item__img">
                        <img src="{!! $block->icon !!}" alt="{!! $block->name !!}">
                    </div>
                    <h3 class="steps__item__title">{!! $block->name !!}</h3>

                    <p class="steps__item__desc">
                        {!! $block->description !!}
                    </p>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['SOLUTION-LOAN-PROCEDURE-DOCUMENTS'][0]))
<section class="prepareDocs">
    <h2 class="heading">
        {!! $blocks['SOLUTION-LOAN-PROCEDURE-DOCUMENTS'][0]->name !!}
    </h2>

    <div class="container">
        <div class="row">
            @if(!empty($blocks['SOLUTION-LOAN-PROCEDURE-DOCUMENTS'][0]->children)) 
            @foreach($blocks['SOLUTION-LOAN-PROCEDURE-DOCUMENTS'][0]->children as $key => $block)
            <div class="col-md-6 offset-md-{{ $key == 0 ? '0' : '1' }} col-lg-5 offset-lg-1 col-xl-5 offset-xl-1">
                <div class="whyChoose__item" data-waypoint="70%">
                    <div class="whyChoose__item__icon">
                        <img src="{!! $block->icon !!}" alt="{!! $block->name !!}">
                    </div>
                    <h3 class="whyChoose__item__name">
                        {!! $block->name !!}
                    </h3>

                    <p class="whyChoose__item__desc">
                        {!! $block->description !!}
                    </p>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['SOLUTION-LOAN-PROCEDURE-FOOTER'][0]))
<section class="getStarted getStarted--cashLoad" style="background-image: url('{!! $blocks['SOLUTION-LOAN-PROCEDURE-FOOTER'][0]->photo !!}')" data-waypoint="70%"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container">
        <h2 class="heading heading--white">
            {!! $blocks['SOLUTION-LOAN-PROCEDURE-FOOTER'][0]->name !!}
        </h2>
        <div class="text-center">
            <a class="btn btn-danger btn-shadow @if($composer_active_popup == true) btn-loan-stop @endif" href="@if($composer_active_popup == false) {!! $blocks['SOLUTION-LOAN-PROCEDURE-FOOTER'][0]->url !!} @endif">Đăng ký ngay</a>
        </div>
    </div>
</section>
@endif

@endsection