@extends('frontend.layouts.master')

@section('content')
    <section class="about about--awards">
        <div>
            <div class="container">
                <h1>{{ trans('menu.video_clip') }}</h1>
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
                <h2><span>{{ trans('menu.video_clip') }}</span></h2>
            </div>
            <div class="news-list news-other--library">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row news-list-content">
                            @foreach($other as $rs)
                                <div class="news-list-content__wrapper col-lg-3 col-sm-4 col-xs-6">
                                    <div  class="news-list__item">
                                        <a class="linkTo" href="{{ route('video_clip.show', $rs->slug) }}"></a>
                                        <div class="videobox" style="background-image: url('https://img.youtube.com/vi/{{$rs->url_video}}/hqdefault.jpg');">
                                            <a class="btn-play"></a>
                                        </div>
                                        <div class="des">
                                            <p class="date">
                                                <i class="arrow_carrot-right"></i>{{ $rs->published_date_format }}</p>
                                            <p>
                                                <a href="{{ route('video_clip.show', $rs->slug) }}">{{ $rs->name }}</a>
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