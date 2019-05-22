@extends('frontend.layouts.master')

@section('content')

<!-- Start breadcrumbs-->
@if(!empty($blocks['SOLUTION-OUR-CUSTOMERS-BANNER'][0]))
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! $blocks['SOLUTION-OUR-CUSTOMERS-BANNER'][0]->photo !!}')"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <h1>{!! $blocks['SOLUTION-OUR-CUSTOMERS-BANNER'][0]->name !!}</h1>

        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
@endif
<!-- End breadcrumbs-->

@if(!empty($blocks['SOLUTION-OUR-CUSTOMERS-GENERAL'][0]))
<section class="theLoanDesc theLoanDesc--3">
    <div class="container">
        <div class="theLoanDesc__inner">
            <h2 class="heading">{!! $blocks['SOLUTION-OUR-CUSTOMERS-GENERAL'][0]->name !!}</h2>

            {!! $blocks['SOLUTION-OUR-CUSTOMERS-GENERAL'][0]->content !!}
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['SOLUTION-OUR-CUSTOMERS-GENERAL'][0]))
<section class="cashWho">
    <div class="container">
        @if(!empty($blocks['SOLUTION-OUR-CUSTOMERS-GENERAL'][0]->children)) 
        @foreach($blocks['SOLUTION-OUR-CUSTOMERS-GENERAL'][0]->children as $key => $block)
        <div class="cashWhoItem" data-waypoint="{!! $key == 0 ? '80%' : '70%' !!}">
            <div class="row align-items-center">
                <div class="col-md-10 text-center">
                    <div class="cashWhoItem__img">
                        <img src="{!! $block->photo !!}" alt="{!! $block->name !!}">
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="cashWhoItem__content">
                        <h3 class="cashWhoItem__head">{!! $block->name !!}</h3>

                        <div class="cashWhoItem__desc">
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
@endif

@if(!empty($blocks['SOLUTION-OUR-CUSTOMERS-DOCUMENTS'][0]))
<section class="documents">
    <div class="container">
        <h2 class="heading">
            {!! $blocks['SOLUTION-OUR-CUSTOMERS-DOCUMENTS'][0]->name !!}
            <small>{!! $blocks['SOLUTION-OUR-CUSTOMERS-DOCUMENTS'][0]->description !!}</small>
        </h2>
    </div>
    <div class="container">
        <div class="documents__content" data-waypoint="70%">
            @if(!empty($blocks['SOLUTION-OUR-CUSTOMERS-DOCUMENTS'][0]->children)) 
            @foreach($blocks['SOLUTION-OUR-CUSTOMERS-DOCUMENTS'][0]->children as $key => $block)
            <div class="whyChoose__item" data-waypoint="70%">
                <div class="whyChoose__item__icon">
                    <img src="{!! $block->icon !!}" alt="">
                </div>
                <h3 class="whyChoose__item__name">{!! $block->name !!}</h3>

                <p class="whyChoose__item__desc">
                    {!! $block->description !!}
                </p>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['SOLUTION-OUR-CUSTOMERS-SHARE'][0]))
<section class="ourCustomers">
    <h2 class="heading">{!! !empty($blocks['SOLUTION-OUR-CUSTOMERS-SHARE'][0]) ? $blocks['SOLUTION-OUR-CUSTOMERS-SHARE'][0]->name : '' !!}</h2>

    <div class="ourCustomers__inner" style="background-image: url(/images/ourCustomers.png)" data-waypoint="70%">
        <div class="ourCustomers__bg">
            @if(!empty($blocks['SOLUTION-OUR-CUSTOMERS-SHARE'][0])
                && !empty($blocks['SOLUTION-OUR-CUSTOMERS-SHARE'][0]->children)) 
            @foreach($blocks['SOLUTION-OUR-CUSTOMERS-SHARE'][0]->children as $key => $block)
            <div class="ourCustomers__bg__item {!! $key == 0 ? 'active' : '' !!}" style="background-image: url('{!! $block->photo !!}')"></div>
            @endforeach
            @endif
        </div>
        <div class="container">
            <div class="ourCustomers__avatar">
                @if(!empty($blocks['SOLUTION-OUR-CUSTOMERS-SHARE'][0]->children)) 
                @foreach($blocks['SOLUTION-OUR-CUSTOMERS-SHARE'][0]->children as $key => $block)
                <div class="ourCustomers__avatar__item {!! $key == 0 ? 'active' : '' !!}">
                    <img src="{!! $block->icon !!}" alt="{!! $block->name !!}">
                </div>
                @endforeach
                @endif
            </div>
            <div class="row">
                <div class="col-md-16 offset-md-4 col-lg-12 offset-lg-8 col-xl-11 offset-xl-9">
                    <div class="customers">
                        <div class="customers__inner">
                            @if(!empty($blocks['SOLUTION-OUR-CUSTOMERS-SHARE'][0]->children)) 
                            @foreach($blocks['SOLUTION-OUR-CUSTOMERS-SHARE'][0]->children as $key => $block)
                            <div class="customers__item">
                                <h3>{!! $block->name !!}</h3>

                                <h4>{!! $block->description !!}</h4>

                                <P>{!! $block->content !!}</P>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['SOLUTION-OUR-CUSTOMERS-FOOTER'][0]))
<section class="getStarted getStarted--cashLoad" style="background-image: url('{!! $blocks['SOLUTION-OUR-CUSTOMERS-FOOTER'][0]->photo !!}')"
    data-waypoint="70%" data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container">
        <h2 class="heading heading--white">
            {!! $blocks['SOLUTION-OUR-CUSTOMERS-FOOTER'][0]->name !!}
        </h2>

        <div class="text-center">
            <a class="btn btn-danger btn-shadow @if($composer_active_popup == true) btn-loan-stop @endif" href="@if($composer_active_popup == false) {!! $blocks['SOLUTION-OUR-CUSTOMERS-FOOTER'][0]->url !!} @endif">Đăng ký ngay</a>
        </div>
    </div>
</section>
@endif

@endsection