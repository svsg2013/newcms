@extends('frontend.layouts.master')

@section('content')

@if(!empty($blocks['ABOUT-OUR-COMPANY-CSV-BANNER'][0]))
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! $blocks['ABOUT-OUR-COMPANY-CSV-BANNER'][0]->photo !!}')"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <h1>{!! $blocks['ABOUT-OUR-COMPANY-CSV-BANNER'][0]->name !!}</h1>
        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
@endif

@if(!empty($blocks['ABOUT-OUR-COMPANY-CSV-GENERAL'][0]))
<section class="csvPage">
    <div class="container">
        <div class="csvIntro" data-animated-effect="fadeInUp">
            <h2 class="heading">{!! $blocks['ABOUT-OUR-COMPANY-CSV-GENERAL'][0]->description !!}</h2>

            {!! $blocks['ABOUT-OUR-COMPANY-CSV-GENERAL'][0]->content !!}
        </div>
    </div>
</section>
@endif

<section class="csvPage csvPage--1">
    <div class="container">
        <div class="container--csv">
            <!--intro-->
            <div class="csvItemMain">
                <div class="csvItemMain__image" data-animated-effect="fadeInLeft">
                    <div class="image">
                        <a style="background-image:url('{{ !empty($shared_value_top[0]) ? $shared_value_top[0]->image : '' }}')" href="{{ route('frontend.shared.value.show', !empty($shared_value_top[0]) ? $shared_value_top[0]->slug : '') }}">
                            <img src="{{ !empty($shared_value_top[0]) ? $shared_value_top[0]->image : '' }}" alt="{{ !empty($shared_value_top[0]) ? $shared_value_top[0]->title : '' }}">
                        </a>
                    </div>
                </div>
                <div class="csvItemMain__info" data-animated-effect="fadeInRight" data-animated-delay="200">
                    <div class="table-full">
                        <div class="table-cell">
                            <h4>{{ !empty($shared_value_top[0]) ? $shared_value_top[0]->title : '' }}</h4>
                            <p>{{ !empty($shared_value_top[0]) ? words($shared_value_top[0]->description, 15, '...') : '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--list-->
            <div class="csvGrid gridGroup">
                @if(!empty($shared_value))
                @foreach($shared_value as $key => $value)
                <div class="gridGroup__wrap" data-animated-effect="fadeInUp" {{ $key != 0 ? 'data-animated-delay='. $key*200 .'' : '' }}>
                    <div class="csvGrid__item gridGroup__item">
                        <div class="csvGrid__item__image gridGroup__item__image">
                            <div class="image">
                                <a style="background-image:url('{{ $value->image }}')" href="{{ route('frontend.shared.value.show', $value->slug) }}">
                                    <img src="{{ $value->image }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="csvGrid__item__info gridGroup__item__info">
                            <h4>
                                <a href="{{ route('frontend.shared.value.show', $value->slug) }}">{{ $value->title }}</a>
                            </h4>
                            <p>{{ words($value->description, 15, '...') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

@if(!empty($blocks['ABOUT-OUR-COMPANY-CSV-FINANCE'][0]))
<section class="csvPage csvPage--2">
    <div class="container">
        <!--intro-->
        <div class="csvIntro csvIntro--2" data-animated-effect="fadeInUp">
            <h2 class="heading">{!! $blocks['ABOUT-OUR-COMPANY-CSV-FINANCE'][0]->name !!}</h2>
            {!! $blocks['ABOUT-OUR-COMPANY-CSV-FINANCE'][0]->content !!}
        </div>
        <div class="csv--accordion" data-animated-effect="fadeInUp" data-animated-delay="200">
            <div class="panel-group" id="category1" role="tabpanel" aria-multiselectable="true">
                @if(!empty($blocks['ABOUT-OUR-COMPANY-CSV-FINANCE'][0]->children)) 
                    @foreach($blocks['ABOUT-OUR-COMPANY-CSV-FINANCE'][0]->children as $key => $block)
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingcsvitem{{ $key }}">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#category1" href="#collapsecsvitem{{ $key }}" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    <span class="icon-title">
                                        <img src="{{ $block->icon }}">
                                    </span>
                                    <span class="icon-tab"></span>
                                    <span class="heading-tab">{{ $key }}. {{ $block->name }}</span>
                                </a>
                            </h4>
                        </div>
                        <div class="panel-collapse collapse in" id="collapsecsvitem{{ $key }}" role="tabpanel" aria-labelledby="headingcsvitem{{ $key }}" data-parent="#category1">
                            <div class="panel-body">
                                <div class="media">
                                    <div class="media-body">
                                        {!! $block->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
@endif

@endsection