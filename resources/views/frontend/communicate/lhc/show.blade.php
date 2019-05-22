@extends('frontend.layouts.master')

@section('style')
    {{--<link rel="stylesheet" href="/assets/plugins/dflip/css/book.min.css">--}}
    <link rel="stylesheet" href="/assets/plugins/dflip/css/dflip.min.css">
    <link rel="stylesheet" href="/assets/plugins/dflip/css/metaboxes.min.css">
    <link rel="stylesheet" href="/assets/plugins/dflip/css/themify-icons.min.css">
@endsection

@section('content')
    <section class="about about--document">
        <div class="container">
            <div class="subheader__news">
                <h1>{{ $catalogue->name }}</h1>
                {!! \Breadcrumb::output() !!}
            </div>

            <div class="about__content brochure__content book">
                <div class="brochure__content__title">
                    <h2 class="recruit__heading">{{ $catalogue->name }}</h2>
                    <div class="wrap__date">
                        <div class="row">
                            <div class="col-xs-6 break480">
                                <span class="recruit__date"> {{ $catalogue->publish_date_format }} </span>
                            </div>
                            <div class="col-xs-6 text-right break480">
                                <a href="{{ $catalogue->url }}" class="btn-download" target="_blank">{{ trans('button.download') }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <p>&nbsp;</p>

                <div id="pdf-book"></div>
            </div>
        </div>
    </section>

    @if($other->count())
        <section class="news__other">
            <div class="container">
                <div class="headings text-center">
                    <h2>
                        <span>{{ trans('news.other') }}</span>
                    </h2>
                </div>
                <div class="news__slider">
                    @foreach($other as $rs)
                        <div class="brochure__content__item">
                            <div class="brochure__content__hover">
                                <div class="brochure__content__img">
                                    <a href="{{ route('news_lhc.show', $rs->slug) }}" style="background-image:url({{ $rs->image }})">
                                        <img src="{{ $rs->image }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <h4>{{ $rs->name }}</h4>
                            <div class="text-center brochure__link">
                                <a href="{{ route('news_lhc.show', $rs->slug) }}"
                                   type="{{ $rs->name }}">{{ trans('button.detail') }}</a>
                                <a href="{{ $rs->url }}" target="_blank"
                                   title="{{ $rs->name }}">{{ trans('button.download') }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection

@section('script')
    <script src="/assets/plugins/dflip/js/dflip.min.js"></script>
    <script src="/assets/plugins/dflip/js/libs/three.min.js"></script>
    <script src="/assets/plugins/dflip/js/libs/mockup.min.js"></script>
    <script src="/assets/plugins/dflip/js/libs/pdf.min.js"></script>
    <script>
        const PDF_FILE = '{{ $catalogue->url }}';
        jQuery(document).ready(function ($) {
            let width = $(window).width();
            let height = '100vh';
            if(width < 560){
                height = '300';
            }
            else if(width < 768){
                height = '400px';
            }

            else if(width < 992){
                height = '500px';
            }

            $('#pdf-book').flipBook(PDF_FILE, {
                height: height
            });
        });
    </script>
@endsection