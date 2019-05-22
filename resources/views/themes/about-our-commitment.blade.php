@extends('frontend.layouts.master')

@section('content')

<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! !empty($blocks['ABOUT-OUR-COMMITMENT-BANNER'][0]) ? $blocks['ABOUT-OUR-COMMITMENT-BANNER'][0]->photo : '' !!}')"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <!-- <h1>Cam kết của EASY CREDIT</h1> -->
        <h1>{!! !empty($blocks['ABOUT-OUR-COMMITMENT-BANNER'][0]) ? $blocks['ABOUT-OUR-COMMITMENT-BANNER'][0]->name : '' !!}</h1>

        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>

@if(!empty($blocks['ABOUT-OUR-COMMITMENT-GENERAL'][0]))
<section class="boxquote">
    <div class="container text-center">
        <h2 class="boxquote__head">{!! $blocks['ABOUT-OUR-COMMITMENT-GENERAL'][0]->name !!}</h2>

        <div class="boxquote__content">{!! $blocks['ABOUT-OUR-COMMITMENT-GENERAL'][0]->description !!}</div>
    </div>
</section>
@endif

<section class="commitments">
    <div class="container">
        <h2 class="heading">{!! $blocks['ABOUT-OUR-COMMITMENT-CONTENT'][0]->name !!}</h2>
    </div>
    <div class="container">
        @if(!empty($blocks['ABOUT-OUR-COMMITMENT-CONTENT'][0]->children)) 
            @foreach($blocks['ABOUT-OUR-COMMITMENT-CONTENT'][0]->children as $key => $block)
            <div class="commitment row align-items-center" data-waypoint="70%">
                <div class="col-sm-10">
                    <div class="commitment__icon">
                        <img src="{!! $block->photo !!}" alt="">
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="commitment__content">
                        <div class="commitment__content__line"></div>
                        <div class="commitment__content__inner">
                            <h3 class="commitment__head">
                                {!! $block->name !!}
                            </h3>

                            <div class="commitment__desc">
                                {!! $block->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</section>

@if(!empty($blocks['ABOUT-OUR-COMMITMENT-REGISTER'][0]))
<section class="getStarted partnerContact" style="background-image: url('{!! $blocks['ABOUT-OUR-COMMITMENT-REGISTER'][0]->photo !!}')"
    data-waypoint="70%" data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container">
        <h2 class="heading heading--white">{!! $blocks['ABOUT-OUR-COMMITMENT-REGISTER'][0]->name !!}</h2>
        <div class="text-center">
            <a class="btn btn-danger btn-shadow btn-lg @if($composer_active_popup == true) btn-loan-stop @endif" href="@if($composer_active_popup == false) {!! $blocks['ABOUT-OUR-COMMITMENT-REGISTER'][0]->url !!} @endif">đăng ký ngay</a>
        </div>
    </div>
</section>
@endif

@endsection