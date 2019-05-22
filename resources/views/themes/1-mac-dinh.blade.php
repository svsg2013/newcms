@extends('frontend.layouts.master')

@section('content')
    <section class="about about--awards">

        @if(!empty($blocks['BANNER']) && count($blocks['BANNER']))
            <div class="subHeader" style="background-image: url('{{ $blocks['BANNER'][0]['photo'] }}')">
                <div class="container">
                    <h1>{{ $blocks['BANNER'][0]['name'] }}</h1>
                </div>
            </div>
        @endif

        <div class="container">
            <div class="endow-page">
                <div class="row">
                    <div class="col-md-12">
                        <div class="endow-page__content">

                            @if($page->group_page && $page->group_page->count())
                                <ul class="nav nav-tabs" role="tablist">
                                    @foreach($page->group_page as $rs)
                                        <li class="{{ $page->slug === $rs->slug ? 'active' : '' }}">
                                            <a href="{{ $rs->url }}" title="{{ $rs->title }}">{{ $rs->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            @include('frontend.layouts.partials.breadcrumb')

                            <div class="text">
                                <div class="title">
                                    <h2>{{ $page->title }}</h2>
                                </div>

                                {!! $page->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / container -->

    </section>
@endsection