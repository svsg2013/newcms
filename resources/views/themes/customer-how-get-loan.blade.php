@extends('frontend.layouts.master')

@section('content')

@if(!empty($blocks['CUSTOMER-HOW-GET-LOAN-BANNER'][0]))
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! $blocks['CUSTOMER-HOW-GET-LOAN-BANNER'][0]->photo !!}')"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <h1>{!! $blocks['CUSTOMER-HOW-GET-LOAN-BANNER'][0]->name !!}</h1>

        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
@endif

@if(!empty($blocks['CUSTOMER-HOW-GET-LOAN-GENERAL'][0]))
<section class="theLoanDesc">
    <div class="container">
        <div class="theLoanDesc__inner">
            <h2 class="heading">{!! $blocks['CUSTOMER-HOW-GET-LOAN-GENERAL'][0]->name !!}</h2>

            {!! $blocks['CUSTOMER-HOW-GET-LOAN-GENERAL'][0]->content !!}
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['CUSTOMER-HOW-GET-LOAN-GENERAL'][0]))
<section class="theLoanStep">
    @if(!empty($blocks['CUSTOMER-HOW-GET-LOAN-GENERAL'][0]->children)) 
    @foreach($blocks['CUSTOMER-HOW-GET-LOAN-GENERAL'][0]->children as $key => $block)
    <div class="theLoanItem" data-waypoint="70%">
        <div class="container">
            <div class="theLoanItem__img">
                <div class="theLoanItem__img__inner" style="background-image:url('{!! $block->photo !!}')">
                    <img src="{!! $block->photo !!}" alt="online service">
                </div>
            </div>
            <div class="theLoanItem__content">
                <img class="theLoanItem__icon" src="{!! $block->icon !!}" alt="">

                <h3 class="theLoanItem__title">{!! $block->name !!}</h3>

                <div class="theLoanItem__desc">
                    {!! $block->content !!}
                </div>

                <div class="theLoanItem__line"></div>
            </div>
            <div class="theLoanItem__btn">
                <a class="btn btn-danger btn-shadow" href="{!! $block->url !!}">Nhận khoản vay ngay</a>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</section>
@endif

@if(!empty($blocks['CUSTOMER-HOW-GET-LOAN-FOOTER'][0]))
<section class="getStarted" style="background-image: url('{!! $blocks['CUSTOMER-HOW-GET-LOAN-FOOTER'][0]->photo !!}')" data-waypoint="70%"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container">
        <!-- <h2 class="heading heading--white">Lorem ipsum dolor
            <strong>sit amet?</strong>
        </h2> -->
        <h2 class="heading heading--white">{!! $blocks['CUSTOMER-HOW-GET-LOAN-FOOTER'][0]->name !!}</h2>

        <div class="text-center">
            <a class="btn btn-danger btn-shadow btn-lg" href="{!! $blocks['CUSTOMER-HOW-GET-LOAN-FOOTER'][0]->url !!}">quản lý khoản vay của bạn</a>
        </div>
    </div>
</section>
@endif

@endsection