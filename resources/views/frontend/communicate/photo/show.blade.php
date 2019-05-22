@extends('frontend.layouts.master')

@section('style')
@endsection

@section('content')
    <section class="about about--awards">
        <div>
            <div class="container">
                <h1>{{ trans('menu.library_photo')}}</h1>
                
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
                                        <h3>{{ $gallery->name }}</h3>
                                    </div>

                                    <div class="subtitle">
                                        <span><i class="arrow_carrot-right"></i>{{ $gallery->published_date_format }}</span><span> {{ trans('button.share') }}
                                            <?php $link = Request::url(); ?>
                                            
                                            @include('frontend.layouts.partials.social', ['link' =>$link , 'title'=>$gallery->name ])
                                        </span>
                                    </div>
                                </div>
                                <div class="detail-page__content__full">
                                    <div class="detail-page__content__big">
                                        @foreach($gallery->medias as $media)
                                            <div>
                                                <div class="content-img" style="background-image: url('{{ getThumbnail($media->path, 930, 530) }}')">
                                                    <img data-src="{{ $media->path }}" src="{{ getThumbnail($media->path, 930, 530) }}" alt="{{ $gallery->name }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="detail-page__content__small">
                                        @foreach($gallery->medias as $media)
                                            <div class="detail-page__content__small__item">
                                                <img src="{{ getThumbnail($media->path, 200, 110) }}" alt="{{ $gallery->name }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news-other news-other--library">
        <div class="container">
            <div class="headings text-center">
                <h2><span>{{ trans('menu.library_photo')}}</span></h2>
            </div>
            <div class="news-list">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row news-list-content">
                            @foreach($other as $rs)
                                <div class="news-list-content__wrapper col-lg-3 col-sm-4 col-xs-6">
                                    <div class="news-list__item">
                                        <a class="linkTo" href="{{ route('library_photo.show', $rs->slug) }}"></a>
                                        <div class="image" style="background-image: url('{{ $rs->media->path ?? null  }}')">
                                            <div class="overlay"></div>
                                            <img src="{{ $rs->media->path ?? null }}" alt="{{ $rs->name }}">
                                            <span></span>
                                        </div>

                                        <div class="des">
                                            <p class="date">
                                                <i class="arrow_carrot-right"></i>{{ $rs->published_date_format }}</p>
                                            <p>
                                                <a href="{{ route('library_photo.show', $rs->slug) }}">{{ $rs->name }}</a>
                                            </p>
                                        </div>
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

