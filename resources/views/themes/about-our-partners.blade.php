@extends('frontend.layouts.master')

@section('content')
@if(!empty($blocks['ABOUT-OUR-PARTNERS-BANNER'][0]))
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! $blocks['ABOUT-OUR-PARTNERS-BANNER'][0]->photo !!}')" data-paroller-factor="0.4"
    data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <!-- <h1>Đối tác liên kết</h1> -->
        <h1>{!! $blocks['ABOUT-OUR-PARTNERS-BANNER'][0]->name !!}</h1>
        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
@endif

@if(!empty($blocks['ABOUT-OUR-PARTNERS-GENERAL'][0]))
<section class="boxquote">
    <div class="container text-center">
        <h2 class="boxquote__head">
            {!! $blocks['ABOUT-OUR-PARTNERS-GENERAL'][0]->description !!}
        </h2>

        <div class="boxquote__content">{!! $blocks['ABOUT-OUR-PARTNERS-GENERAL'][0]->content !!}</div>
    </div>
</section>
@endif

@if(!empty($blocks['ABOUT-OUR-PARTNERS-SERVICE'][0]))
<section class="partnerRow">
    <div class="container">
        <h2 class="heading">{!! $blocks['ABOUT-OUR-PARTNERS-SERVICE'][0]->name !!}</h2>
        <div class="row justify-content-center text-center">
            @if(!empty($blocks['ABOUT-OUR-PARTNERS-SERVICE'][0]->children)) 
                @foreach($blocks['ABOUT-OUR-PARTNERS-SERVICE'][0]->children as $key => $block)
                <div class="col-6">
                    <a href="{{ $block->url }}" target="_blank">
                        <img src="{{ $block->photo }}" alt="">
                    </a>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['ABOUT-OUR-PARTNERS-PAY'][0]))
<section class="partnerRow">
    <div class="container">
        <h2 class="heading">
            {!! $blocks['ABOUT-OUR-PARTNERS-PAY'][0]->name !!}
        </h2>
        <div class="row justify-content-center text-center">
            @if(!empty($blocks['ABOUT-OUR-PARTNERS-PAY'][0]->children)) 
                @foreach($blocks['ABOUT-OUR-PARTNERS-PAY'][0]->children as $key => $block)
                <div class="col-7">
                    <a href="{{ $block->url }}" target="_blank">
                        <img src="{{ $block->photo }}" alt="">
                    </a>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['ABOUT-OUR-PARTNERS-OPERATE'][0]))
<section class="partnerRow">
    <div class="container">
        <h2 class="heading">
            {!! $blocks['ABOUT-OUR-PARTNERS-OPERATE'][0]->name !!}
        </h2>
        <div class="row justify-content-center text-center">
            @if(!empty($blocks['ABOUT-OUR-PARTNERS-OPERATE'][0]->children)) 
                @foreach($blocks['ABOUT-OUR-PARTNERS-OPERATE'][0]->children as $key => $block)
                <div class="col-7">
                    <a href="{{ $block->url }}" target="_blank">
                        <img src="{{ $block->photo }}" alt="">
                    </a>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['ABOUT-OUR-PARTNERS-FOOTER'][0]))
<section class="getStarted partnerContact" style="background-image: url('{!! $blocks['ABOUT-OUR-PARTNERS-FOOTER'][0]->photo !!}')" data-waypoint="70%"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container">
        <h2 class="heading heading--white">
            {!! $blocks['ABOUT-OUR-PARTNERS-FOOTER'][0]->description !!}
        </h2>
        <div class="text-center">
            <a class="btn btn-light btn-shadow btn-lg" href="mailto:info@easycredit.vn">GỬI QUA EMAIL</a>
            <span>- HOẶC - </span>
            <a class="btn btn-danger btn-shadow btn-lg" href="tel:19001066">GỌI NGAY</a>
        </div>
    </div>
</section>
@endif

@endsection