@extends('frontend.layouts.master')

@section('content')

<!-- Start breadcrumbs-->
@if(!empty($blocks['BANNER-POLICY'][0]))
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! $blocks['BANNER-POLICY'][0]->photo !!}')"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <h1>{!! $blocks['BANNER-POLICY'][0]->name !!}</h1>
        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
@endif
<!-- End breadcrumbs-->

@if(!empty($blocks['POLICY-CONTENT'][0]))
<section class="aboutIntro" style="padding-bottom:20px">
    <div class="container container--about container--terms pt-5">
        <h2 class="heading">{!! $blocks['POLICY-CONTENT'][0]->name !!}</h2>
        <p style="font-size:19px;font-style:italic;font-weight:500">{!! $blocks['POLICY-CONTENT'][0]->description !!}</p>
    </div>
</section>
<section class="mb-5">
    <div class="container container--about container--terms">
        {!! $blocks['POLICY-CONTENT'][0]->content !!} 
    </div>
</section>
@endif
@if(!empty($blocks['NOIDUNG-TEST'][0]))
<section class="aboutIntro" style="padding-bottom:20px">
    <div class="container container--about container--terms pt-5">
        <h2 class="heading">{!! $blocks['NOIDUNG-TEST'][0]->name !!}</h2>
        <p style="font-size:19px;font-style:italic;font-weight:500">{!! $blocks['NOIDUNG-TEST'][0]->description !!}</p>
    </div>
</section>
<section class="mb-5">
    <div class="container container--about container--terms">
        {!! $blocks['NOIDUNG-TEST'][0]->content !!} 
    </div>
</section>
@endif
@endsection