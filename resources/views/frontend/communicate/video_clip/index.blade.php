@extends('frontend.layouts.master')

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

            <div class="news-highlights">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-9 col-xs-12 col-sm-9 news-highlights__item">
                                <div class="news-highlights__item__full">
                                    @foreach($galleries as $key => $gallery)
                                        <div class="videobox" style="background-image: url('https://img.youtube.com/vi/{{ $gallery->url_video }}/maxresdefault.jpg');">
                                            <iframe id="video" width="560" height="315" src="https://www.youtube.com/embed/{{ $gallery->url_video }}?enablejsapi=1&amp;showinfo=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                                            <a id="play-button" class="btn-play"></a>
                                            <script>
                                                var player;
                                                function onYouTubePlayerAPIReady() {
                                                    player = new YT.Player('video', {
                                                        events: {
                                                            'onReady': onPlayerReady
                                                        }
                                                    });
                                                }
                                                function onPlayerReady(event) {
                                                    var playButton = document.getElementById("play-button");
                                                    playButton.addEventListener("click", function() {
                                                        player.playVideo();
                                                        this.parentElement.className += " showvideo";
                                                    });
                                                }
                                                var tag = document.createElement('script');
                                                tag.src = "//www.youtube.com/player_api";
                                                var firstScriptTag = document.getElementsByTagName('script')[0];
                                                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                                            </script>
                                        </div>
                                        <div class="content-text video">
                                            <p class="date">
                                                <i class="arrow_carrot-right"></i>{{ $gallery->published_date_format }}</p>
                                            <p>{{ $gallery->name }}</p>
                                        </div>
                                            @break($key === 0)

                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-3 col-xs-12 col-sm-3 news-highlights__item">
                                <div class="row">
                                    @foreach($galleries as $key => $gallery)
                                        @continue($key === 0 || $key > 2)
                                        <div class="col-lg-12 news-list__item">
                                        <a class="linkTo" href="{{ route('video_clip.show', $gallery->slug) }}"></a>
                                        <div class="videobox" style="background-image: url('https://img.youtube.com/vi/{{ $gallery->url_video }}/mqdefault.jpg');">
                                            <a class="btn-play"></a>
                                        </div>
                                        <div class="des">
                                            <p class="date">
                                                <i class="arrow_carrot-right"></i>{{ $gallery->published_date_format }}</p>
                                            <p><a href="{{ route('video_clip.show', $gallery->slug) }}">{{ $gallery->name }}</a></p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / news highlights -->

            <div class="news-list">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($galleries as $key => $gallery)
                                @continue($key < 3)
                                <div class="col-lg-3 col-sm-4 col-xs-6 news-list__item">
                                <a class="linkTo" href="{{ route('video_clip.show', $gallery->slug) }}"></a>
                                <div class="videobox" style="background-image: url('https://img.youtube.com/vi/{{ $gallery->url_video }}/mqdefault.jpg');">
                                    <a class="btn-play"></a>
                                </div>
                                <div class="des">
                                    <p class="date">
                                        <i class="arrow_carrot-right"></i>{{ $gallery->published_date_format }}</p>
                                    <p><a href="{{ route('video_clip.show', $gallery->slug) }}">{{ $gallery->name }}</a></p>
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