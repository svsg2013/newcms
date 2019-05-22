@extends('frontend.layouts.master')

@section('style')
@endsection

@section('content')
    @php $banner = Slider::$banner; @endphp
    <section class="subHeader subHeader--news-page" style="background-image: url('{{ !empty($banner) ? $banner['image'] : 'http://fakeimg.pl/1600x600/0c8641/000?text=COMMUNICATION' }}')">
        <div class="container">
            <h1>{{ trans('menu.media') }}</h1>

            @include('frontend.layouts.partials.breadcrumb')
        </div>

        @include('frontend.communicate.partials.slider')
    </section>

    <section class="about about--awards">
        <div class="container">

            @include('frontend.communicate.partials.nav-tabs')

            <div class="news-highlights news-highlights--library">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-9 col-xs-12 col-sm-9 news-highlights__item">
                                <div class="news-highlights__item__full">
                                    <div class="news-highlights__item__avatar">
                                        @foreach($galleries as $key => $gallery)
                                            @foreach($gallery->medias as $media)
                                                <div>
                                                    <div class="content-img">
                                                        <img src="{{ getThumbnail($media->path, 930, 530) }}" alt="{{ $gallery->name }}">
                                                    </div>
                                                    <div class="content-text">
                                                        <p class="date">
                                                            <i class="arrow_carrot-right"></i>{{ $gallery->published_date_format }}</p>
                                                        <p>{{ $gallery->name }}</p>
                                                    </div>
                                                </div>
                                            @endforeach

                                            @break($key === 0)

                                        @endforeach
                                    </div>
                                    <div class="news-highlights__item__wrapper">
                                        @foreach($galleries as $key => $gallery)
                                            @foreach($gallery->medias as $media)
                                                <div class="wrapper__item">
                                                    <img src="{{ getThumbnail($media->path, 200, 110) }}" alt="{{ $gallery->name }}">
                                                </div>
                                            @endforeach
                                            @break($key === 0)
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-xs-12 col-sm-3 news-highlights__item">
                                <div class="row">
                                    @foreach($galleries as $key => $gallery)
                                        @continue($key === 0 || $key > 2)
                                        <div class="col-lg-12 news-list__item">
                                        <a class="linkTo" href="{{ route('library_photo.show', $gallery->slug) }}"></a>
                                        <div class="image" style="background-image: url('{{ $gallery->media->path ?? null }}')">
                                            <div class="overlay"></div>
                                            <img src="{{ $gallery->media->path ?? null }}" alt="">
                                            <span></span>
                                        </div>
                                        <div class="des">
                                            <p class="date">
                                                <i class="arrow_carrot-right"></i>{{ $gallery->published_date_format }}</p>
                                            <p><a href="{{ route('library_photo.show', $gallery->slug) }}">{{ $gallery->name }}</a></p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="news-list">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($galleries as $key => $gallery)
                                @continue($key < 3)
                                <div class="col-lg-3 col-sm-4 col-xs-6 news-list__item">
                                    <a class="linkTo" href="{{ route('library_photo.show', $gallery->slug) }}"></a>
                                    <div class="image" style="background-image: url('{{ $gallery->media->path ?? null }}')">
                                        <div class="overlay"></div>
                                        <img src="{{ $gallery->media->path ?? null }}" alt="{{ $gallery->name }}">
                                        <span></span>
                                    </div>
                                    <div class="des">
                                        <p class="date">
                                            <i class="arrow_carrot-right"></i>{{ $gallery->published_date_format }}</p>
                                        <p><a href="{{ route('library_photo.show', $gallery->slug) }}">{{ $gallery->name }}</a></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{ $galleries->links('vendor.pagination.long-hau') }}
        </div>

    </section>
@endsection

@section('script')
    <script src="/assets/plugins/lightslider/src/js/lightslider.js"></script>
    <script src="/assets/plugins/lightgallery/src/js/lightgallery.js"></script>
    <script>
        $(document).ready(function() {
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                loop:true,
                verticalHeight:500,
                keyPress:true,
                onSliderLoad: function(el) {
                    $('#image-gallery').removeClass('cS-hidden');
                    el.lightGallery({
                        selector: '#image-gallery .lslide'
                    });
                }
            });
        });
    </script>
@endsection