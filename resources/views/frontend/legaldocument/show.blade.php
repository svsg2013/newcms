@extends('frontend.layouts.master')

@section('content')
    <section class="about about--awards">
        <div class="subHeader--detail-page"> <!-- subHeader -->
            <div class="container">
                <h1>{{ trans('menu.legal-documents') }}</h1>

                @include('frontend.layouts.partials.breadcrumb')
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-page">
                        <div class="row">
                            <div class="col-md-10 detail-page__content">
                                <div class="text">
                                    <div class="title">
                                            <h3>{{ $legal->title }}</h3>
                                    </div>

                                    <div class="subtitle">
                                        <span><i class="arrow_carrot-right"></i>{{ $legal->publish_at_format }}</span><span>{{ trans('button.share') }} <i class="social_facebook"></i><i class="social_googleplus"></i></span>
                                    </div>

                                    {!! $legal->content !!}

                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- / container -->
    </section>
    <section class="news-other">
        <div class="container">
            <div class="headings text-center">
                <h2><span>{{ trans('news.related_legal') }}</span></h2>
            </div>
            <div class="news-list">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($related as $rs)
                                <div class="col-lg-3 col-sm-4 col-xs-6 news-list__item">
                                    <div class="image" style="background-image: url('{{ $rs->image }}')">
                                        <div class="overlay"></div>
                                        <img src="{{ $rs->image }}" alt="{{ $rs->title }}">
                                        <span></span>
                                    </div>
                                    <div class="des">
                                        <p class="date">
                                            <i class="arrow_carrot-right"></i>{{ $rs->publish_at_format }}</p>
                                        <p><a href="{{ route('legaldocuments.show', $rs->slug ) }}">{{ $rs->title }}</a></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection