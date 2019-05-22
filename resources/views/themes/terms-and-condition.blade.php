@extends('frontend.layouts.master')

@section('content')

<!-- Start breadcrumbs-->
@if(!empty($blocks['TERMS-AND-CONDITION-BANNER'][0]))
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! $blocks['TERMS-AND-CONDITION-BANNER'][0]->photo !!}')"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <h1>{!! $blocks['TERMS-AND-CONDITION-BANNER'][0]->name !!}</h1>
        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
@endif
<!-- End breadcrumbs-->

@if(!empty($blocks['TERMS-AND-CONDITION-GENERAL'][0]))
<section class="aboutIntro">
    <div class="container container--about container--terms pt-5">
        <h2 class="heading">{!! $blocks['TERMS-AND-CONDITION-GENERAL'][0]->name !!}</h2>
        {!! $blocks['TERMS-AND-CONDITION-GENERAL'][0]->description !!}
    </div>
</section>
<section class="mb-5">
    <div class="container container--about container--terms">
        {!! $blocks['TERMS-AND-CONDITION-GENERAL'][0]->content !!} Chi tiết vui lòng xem <a href="{!! $blocks['TERMS-AND-CONDITION-GENERAL'][0]->url !!}">tại đây.</a>
    </div>
</section>
@endif

@endsection