@extends('frontend.layouts.master')

@section('content')

<!-- Start breadcrumbs-->
@if(!empty($blocks['CONFIDENTIALITY-NOTICE-BANNER'][0]))
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! $blocks['CONFIDENTIALITY-NOTICE-BANNER'][0]->photo !!}')"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <h1>{!! $blocks['CONFIDENTIALITY-NOTICE-BANNER'][0]->name !!}</h1>
        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
@endif
<!-- End breadcrumbs-->

@if(!empty($blocks['CONFIDENTIALITY-NOTICE-GENERAL'][0]))
<section class="aboutIntro mb-5">
    <div class="container container--about container--terms pt-5">
        <h2 class="heading">{!! $blocks['CONFIDENTIALITY-NOTICE-GENERAL'][0]->name !!}</h2>
        {!! $blocks['CONFIDENTIALITY-NOTICE-GENERAL'][0]->content !!}
    </div>
</section>
@endif

@endsection