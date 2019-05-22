@extends('frontend.layouts.master')

@section('style')

@endsection

@section('content')
    @if(!empty($blocks['HEAD']) && count($blocks['HEAD']))
        <div class="bannerInnerlive">
            <div class="bannerInnerlive__img" style="background-image:url({{$blocks['HEAD'][0]['photo']}});"><img
                        src="{{$blocks['HEAD'][0]['photo']}}" alt=""></div>
            <div class="container">
                <div class="bannerInnerlive__info">
                    <div class="innerLogo"><img src="{{$blocks['HEAD'][0]['icon']}}" alt="">
                    </div>
                    <div class="innerTagline">
                        <h4>{{$blocks['HEAD'][0]['name']}}</h4>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(!empty($blocks['DESCRIPTION']) && count($blocks['DESCRIPTION']))
        <section class="dreamMain--3 liveMain">
            <div class="container">
                <div class="dreamInfo--3">
                    <p>{{ $blocks['DESCRIPTION'][0]['description'] }}</p>
                </div>
            </div>
        </section>
    @endif

    @if(!empty($blocks['VIDEO']) && count($blocks['VIDEO']))
        <section class="dreamMain liveMain--2">
            <div class="container">
                <div class="videoBox" style="background-image: url('/assets/images/dream/bg-video.jpg');">
                    <iframe id="video" width="560" height="315"
                            src="https://www.youtube.com/embed/{{get_youtube_id($blocks['VIDEO'][0]['url'])}}?enablejsapi=1&showinfo=0"
                            frameborder="0"
                            gesture="media" allow="encrypted-media" allowfullscreen=""></iframe>
                    <a class="btn-play" id="play-button"></a>
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
                            playButton.addEventListener("click", function () {
                                player.playVideo();
                                this.parentElement.className += " showvideo";
                            });
                        }

                        // Inject YouTube API script
                        var tag = document.createElement('script');
                        tag.src = "//www.youtube.com/player_api";
                        var firstScriptTag = document.getElementsByTagName('script')[0];
                        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                    </script>
                </div>
            </div>
        </section>
        <div class="videoMb"><a data-toggle="modal" data-target="#videopp" href="#">View project video</a>
            <div class="modal fade" id="videopp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        <div class="modal-body">
                            <iframe width="100%" height="315" src="{{$blocks['VIDEO'][0]['url']}}" frameborder="0"
                                    gesture="media" allow="encrypted-media" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(!empty($blocks['SLIDER-01']) && count($blocks['SLIDER-01']))
        <section class="liveMain--3">
            <div class="container">
                <div class="liveMain--3__info">
                    <div class="sliderImg" id="SLIDER-01">
                        @foreach($blocks['SLIDER-01'][0]->children as $dr)
                            <div>
                                <div class="sliderImg__inner" style="background-image:url({{$dr->photo}});"><img
                                            src="{{$dr->photo}}" alt=""></div>
                            </div>
                        @endforeach
                    </div>
                    <div class="sliderNav" id="SLIDER-01-nav">
                        @foreach($blocks['SLIDER-01'][0]->children as $dr)
                            <div>
                                <div class="sliderNav__inner">
                                    <h4>{{$dr->name}}</h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="slider--info text-center">
                        <h5>{{$blocks['SLIDER-01'][0]['name']}}</h5>
                        <p>{{ $blocks['SLIDER-01'][0]['description'] }}</p>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(!empty($blocks['SLIDER-02']) && count($blocks['SLIDER-02']))
        <section class="liveMain--4 liveMain--4--gray">
            <div class="container">
                <div class="liveMain--4__inner">
                    <div class="liveMain--4__info">
                        <div class="liveInfo">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="liveInfo__des">
                                        <p>{{ $blocks['SLIDER-02'][0]['description'] }}</p>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="liveInfo__img">
                                        <h3 class="heading--1">{{$blocks['SLIDER-02'][0]['name']}}</h3>
                                        <div class="sliderImg" id="SLIDER-02">
                                            @foreach($blocks['SLIDER-02'][0]->children as $dr)
                                                <div>
                                                    <div class="sliderImg__inner"
                                                         style="background-image:url({{$dr->photo}});"><img
                                                                src="{{$dr->photo}}" alt=""></div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="sliderNav" id="SLIDER-02-nav">
                                            @foreach($blocks['SLIDER-02'][0]->children as $dr)
                                                <div>
                                                    <div class="sliderNav__inner">
                                                        <h4>{{$dr->name}}</h4>
                                                    </div>
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
    @endif

    @if(!empty($blocks['SLIDER-03']) && count($blocks['SLIDER-03']))
        <section class="liveMain--4">
            <div class="container">
                <div class="liveMain--4__inner">
                    <div class="liveMain--4__info">
                        <div class="liveInfo">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="liveInfo__img">
                                        <h3 class="heading--1 text-right">{{$blocks['SLIDER-03'][0]['name']}}</h3>
                                        <div class="sliderImg" id="SLIDER-03">
                                            @foreach($blocks['SLIDER-03'][0]->children as $dr)
                                                <div>
                                                    <div class="sliderImg__inner"
                                                         style="background-image:url({{$dr->photo}});"><img
                                                                src="{{$dr->photo}}" alt=""></div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="sliderNav" id="SLIDER-03-nav">
                                            @foreach($blocks['SLIDER-03'][0]->children as $dr)
                                                <div>
                                                    <div class="sliderNav__inner">
                                                        <h4>{{$dr->name}}</h4>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="liveInfo__des liveInfo__des--right">
                                        <p>{{ $blocks['SLIDER-03'][0]['description'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!empty($blocks['WEALTH-FACILITIES']) && count($blocks['WEALTH-FACILITIES']))
                    <div class="liveMain--4__inner liveMain--5">
                        <div class="row">
                            <div class="col-16">
                                <div class="liveMain--4__info">
                                    <div class="liveInfo5">
                                        <h4>{{$blocks['WEALTH-FACILITIES'][0]['name']}}</h4>
                                        @php
                                            $children = $blocks['WEALTH-FACILITIES'][0]->children;
                                        @endphp
                                        @if(count($children))
                                            <ul>
                                                @for($i=0; $i<=count($children)/2; $i++)
                                                    <li><a href="{{$children[$i]->url}}">{{$children[$i]->name}}</a>
                                                    </li>
                                                @endfor
                                            </ul>
                                            <ul>
                                                @for($i; $i<count($children); $i++)
                                                    <li><a href="{{$children[$i]->url}}">{{$children[$i]->name}}</a>
                                                    </li>
                                                @endfor
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif

    @if(!empty($blocks['LIFESTYLE']) && count($blocks['LIFESTYLE']))
        <section class="dreamMain--5 liveMain--6">
            <div class="container">
                <div class="dreamMain--5__inner">
                    <h4>{{$blocks['LIFESTYLE'][0]['name']}}</h4>
                    <p>{{$blocks['LIFESTYLE'][0]['description']}}</p>
                </div>
            </div>
        </section>
    @endif

    @if(!empty($blocks['SLIDER-04']) && count($blocks['SLIDER-04']))
        <section class="liveMain--4 liveMain--7 liveMain--4--gray">
            <div class="container">
                <div class="liveMain--4__inner">
                    <div class="liveMain--4__info">
                        <div class="liveInfo">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="liveInfo__des">
                                        <p>{{ $blocks['SLIDER-04'][0]['description'] }}</p>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="liveInfo__img">
                                        <h3 class="heading--1">{{ $blocks['SLIDER-04'][0]['name'] }}</h3>
                                        <div class="sliderImg" id="SLIDER-04">
                                            @foreach($blocks['SLIDER-04'][0]->children as $dr)
                                                <div>
                                                    <div class="sliderImg__inner"
                                                         style="background-image:url({{$dr->photo}});"><img
                                                                src="{{$dr->photo}}" alt=""></div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="sliderNav" id="SLIDER-04-nav">
                                            @foreach($blocks['SLIDER-04'][0]->children as $dr)
                                                <div>
                                                    <div class="sliderNav__inner">
                                                        <h4>{{$dr->name}}</h4>
                                                    </div>
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
    @endif
@endsection

@section('script')

@endsection