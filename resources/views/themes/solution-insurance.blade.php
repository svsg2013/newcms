@extends('frontend.layouts.master')

@section('content')

<!-- Start breadcrumbs-->
@if(!empty($blocks['SOLUTION-INSURANCE-BANNER'][0]))
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! $blocks['SOLUTION-INSURANCE-BANNER'][0]->photo !!}')" data-paroller-factor="0.4"
    data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <!-- <h1>Bảo hiểm</h1> -->
        <h1>{!! $blocks['SOLUTION-INSURANCE-BANNER'][0]->name !!}</h1>
        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
@endif
<!-- End breadcrumbs-->

@if(!empty($blocks['SOLUTION-INSURANCE-GENERAL'][0]))
<section class="theLoanDesc theLoanDesc--3">
    <div class="container">
        <div class="theLoanDesc__inner">
            <h2 class="heading">
                {!! $blocks['SOLUTION-INSURANCE-GENERAL'][0]->name !!}
            </h2>

            {!! $blocks['SOLUTION-INSURANCE-GENERAL'][0]->content !!}
        </div>
        <div class="boxInsurance">
            @if(!empty($blocks['SOLUTION-INSURANCE-GENERAL'][0]->children)) 
            @foreach($blocks['SOLUTION-INSURANCE-GENERAL'][0]->children as $key => $block)
            <div class="boxInsurance__item row align-items-center" data-waypoint="70%">
                <div class="col-sm-10">
                    <div class="boxInsurance__icon">
                        <img src="{!! $block->photo !!}" alt="">
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="boxInsurance__content">
                        <div class="boxInsurance__content__line"></div>
                        <h3 class="boxInsurance__head">
                            {!! $block->description !!}
                        </h3>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['SOLUTION-INSURANCE-PACKAGE'][0]))
<section class="theLoanDesc theLoanDesc--3 packInsurance">
    <div class="container">
        <div class="theLoanDesc__inner">
            <h2 class="heading">
                {!! $blocks['SOLUTION-INSURANCE-PACKAGE'][0]->name !!}
            </h2>

            {!! $blocks['SOLUTION-INSURANCE-PACKAGE'][0]->content !!}
        </div>
        <div class="priceTable" data-waypoint="70%">
            @if(!empty($blocks['SOLUTION-INSURANCE-PACKAGE'][0]->children)) 
            @foreach($blocks['SOLUTION-INSURANCE-PACKAGE'][0]->children as $key => $block)
                <div class="priceTable__item" data-waypoint="70%">
                    <h3 class="priceTable__head">
                        {!! $block->name !!}
                    </h3>

                    <div class="priceTable__body">
                        {!! $block->description !!}

                        {!! $block->content !!}
                    </div>
                </div>
                @if($key == 0)
                <div class="priceTable__headBG"></div>
                @endif
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['SOLUTION-INSURANCE-JOIN'][0]))
<section class="theLoanDesc theLoanDesc--3">
    <div class="container">
        <div class="theLoanDesc__inner">
            <h2 class="heading">
                {!! $blocks['SOLUTION-INSURANCE-JOIN'][0]->name !!}
            </h2>

            {!! $blocks['SOLUTION-INSURANCE-JOIN'][0]->content !!}
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['SOLUTION-INSURANCE-FOOTER'][0]))
<section class="getStarted getStarted--cashLoad" style="background-image: url('{!! $blocks['SOLUTION-INSURANCE-FOOTER'][0]->photo !!}')" data-waypoint="70%"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container">
        <h2 class="heading heading--white">
            {!! $blocks['SOLUTION-INSURANCE-FOOTER'][0]->name !!}
        </h2>

        <div class="text-center">
            <a class="btn btn-danger btn-shadow @if($composer_active_popup == true) btn-loan-stop @endif" href="@if($composer_active_popup == false) {!! $blocks['SOLUTION-INSURANCE-FOOTER'][0]->url !!} @endif">Đăng ký ngay</a>
        </div>
    </div>
</section>
@endif

@endsection