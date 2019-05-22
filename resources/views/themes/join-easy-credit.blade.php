@extends('frontend.layouts.master')

@section('content')

<!-- Start breadcrumbs-->
@if(!empty($blocks['JOIN-EASY-CREDIT-BANNER'][0]))
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! $blocks['JOIN-EASY-CREDIT-BANNER'][0]->photo !!}')"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <h1>{!! $blocks['JOIN-EASY-CREDIT-BANNER'][0]->name !!}</h1>
        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
@endif

@if(!empty($blocks['JOIN-EASY-CREDIT-GENERAL'][0]))
<section class="joinDesc">
    <div class="container">
        <h2 class="heading">{!! $blocks['JOIN-EASY-CREDIT-GENERAL'][0]->name !!}</h2>

        {!! $blocks['JOIN-EASY-CREDIT-GENERAL'][0]->content !!}
    </div>
</section>
@endif


<section class="joinWhoWeAre">
    <div class="container">
        <div class="row">
            @if(!empty($blocks['JOIN-EASY-CREDIT-GENERAL'][0]) && !empty($blocks['JOIN-EASY-CREDIT-GENERAL'][0]->children))
            @foreach($blocks['JOIN-EASY-CREDIT-GENERAL'][0]->children as $key => $block)
            <div class="col-md-10">
                <a class="joinWhoWeAre__item" href="{!! $block->url !!}" title="{!! $block->name !!}">
                    <span class="joinWhoWeAre__item__img" style="background-image: url('{!! $block->photo !!}'">
                        <img src="{!! $block->photo !!}" alt="{!! $block->name !!}">
                    </span>
                    <span class="joinWhoWeAre__item__inner">
                        <span class="joinWhoWeAre__item__title">{!! $block->name !!}</span>
                        <span class="joinWhoWeAre__item__more">Xem thêm</span>
                    </span>
                </a>
            </div>
            @endforeach
            @endif
        </div>
        <div class="joinWhoWeAre__btn text-center">
            <a class="btn btn-danger btn-lg" href="{!! $blocks['JOIN-EASY-CREDIT-URL'][0]->url !!}">{!!
                $blocks['JOIN-EASY-CREDIT-URL'][0]->name !!}</a>
        </div>
    </div>
</section>

@include('themes.partials.register_career')

@endsection