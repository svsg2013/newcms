@extends('frontend.layouts.master')

@section('style')

@endsection

@section('content')
    @if(!empty($blocks['HEAD']) && count($blocks['HEAD']))
    <div class="bannerInner" style="background-image:url({{$blocks['HEAD'][0]['photo']}});"><img src="{{$blocks['HEAD'][0]['photo']}}" alt="{{$blocks['HEAD'][0]['name']}}">
        <div class="container">
            <div class="bannerInner__inner">
                <div class="bannerInner__info">
                    <h3>{{$blocks['HEAD'][0]['name']}}</h3>
                    <p>{!! nl2br($blocks['HEAD'][0]['description']) !!}</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(!empty($blocks['VIDEO']) && count($blocks['VIDEO']))
    <section class="dreamMain">
        <div class="container">
            <div class="videoBox" style="background-image: url('{{$blocks['VIDEO'][0]['photo']}}');">
                <iframe id="video" width="560" height="315" src="https://www.youtube.com/embed/{{get_youtube_id($blocks['VIDEO'][0]['url'])}}?enablejsapi=1&showinfo=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen=""></iframe>
                <a class="btn-play" id="play-button"></a>
                <script>
                    var player;
                    function onYouTubePlayerAPIReady() {
                        player = new YT.Player('video', {
                            events: {
                                'onReady': onPlayerReady
                            }
                        });
                    };
                    function onPlayerReady(event) {
                        var playButton = document.getElementById("play-button");
                        playButton.addEventListener("click", function() {
                            player.playVideo();
                            console.log(player);
                            this.parentElement.className += " showvideo";
                        });
                    };

                    var tag = document.createElement('script');
                    tag.src = "//www.youtube.com/player_api";
                    var firstScriptTag = document.getElementsByTagName('script')[0];
                    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                </script>
            </div>
        </div>
    </section>
    <div class="videoMb"><a data-toggle="modal" data-target="#videopp" href="#">View project video</a>
        <div class="modal fade" id="videopp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <div class="modal-body">
                        <iframe width="100%" height="315" src="{{$blocks['VIDEO'][0]['url']}}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(!empty($blocks['VISION']) && count($blocks['VISION']))
    <section class="dreamMain--2">
        <div class="container">
            <div class="dreamInfo">
                <div class="row align-items-center">
                    <div class="col-md-7 col-16">
                        <div class="dreamInfo__des">
                            <h4>{{$blocks['VISION'][0]['name']}}</h4>
                            <p>{{$blocks['VISION'][0]['description']}}</p>
                        </div>
                    </div>
                    <div class="col-md-9 col-16">
                        <div class="dreamInfo__img" style="background-image:url({{$blocks['VISION'][0]['photo']}});"><img src="{{$blocks['VISION'][0]['photo']}}" alt="{{$blocks['VISION'][0]['name']}}"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(!empty($blocks['DREAMMAIN-3']) && count($blocks['DREAMMAIN-3']))
    <section class="dreamMain--3">
        <div class="container">
            <div class="dreamInfo--3">
                <p>{{$blocks['DREAMMAIN-3'][0]['description']}}</p>
            </div>
        </div>
    </section>
    @endif

    @if(!empty($blocks['DREAMMAIN-4']) && count($blocks['DREAMMAIN-4']))
        <section class="dreamMain--4">
            <div class="container">
                <div class="dreamMain--4__info">
                    <div class="dreamMain--4__inner">
                        <div class="sliderImg" id="DREAMMAIN-4">
                            @foreach($blocks['DREAMMAIN-4'][0]->children as $dr)
                                <div>
                                    <div class="sliderImg__inner" style="background-image:url({{$dr->photo}});"><img src="{{$dr->photo}}" alt=""></div>
                                </div>
                            @endforeach
                        </div>
                        <div class="sliderNav" id="DREAMMAIN-4-nav">
                            @foreach($blocks['DREAMMAIN-4'][0]->children as $dr)
                                <div>
                                    <div class="sliderNav__inner">
                                        <h4>{{$dr->name}}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="sliderInfo">
                            <div class="slider--info">
                                <p>{{ $blocks['DREAMMAIN-4'][0]['description'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(!empty($blocks['DREAMMAIN-5']) && count($blocks['DREAMMAIN-5']))
    <section class="dreamMain--5">
        <div class="container">
            <div class="dreamMain--5__inner">
                <h4>{!! $blocks['DREAMMAIN-5'][0]['name'] !!}</h4>
                <p>{!! $blocks['DREAMMAIN-5'][0]['description'] !!}</p>
            </div>
        </div>
    </section>
    @endif

    @if(!empty($blocks['DREAMMAIN-6']) && count($blocks['DREAMMAIN-6']))
    <section class="dreamMain--6">
        <div class="container">
            <div class="dreamInfo">
                <div class="row align-items-center">
                    <div class="col-md-9 col-16">
                        <div class="dreamInfo__img" style="background-image:url({{$blocks['DREAMMAIN-6'][0]['photo']}});"><img src="/assets/images/dream/img2.jpg" alt=""></div>
                    </div>
                    <div class="col-md-7 col-16">
                        <div class="dreamInfo__des">
                            <h4>{{$blocks['DREAMMAIN-6'][0]['name']}}</h4>
                            <p>{{$blocks['DREAMMAIN-6'][0]['description']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(!empty($blocks['DREAMMAIN-7']) && count($blocks['DREAMMAIN-7']))
    <section class="dreamMain--7">
        <div class="container">
            <div class="dreamInfo">
                <div class="row align-items-center">
                    <div class="col-md-7 col-16">
                        <div class="dreamInfo__des">
                            <h4>{!! $blocks['DREAMMAIN-7'][0]['name'] !!}</h4>
                            <p>{!! $blocks['DREAMMAIN-7'][0]['description'] !!}</p>
                        </div>
                    </div>
                    <div class="col-md-9 col-16">
                        <div class="dreamInfo__img" style="background-image:url({{$blocks['DREAMMAIN-7'][0]['photo']}});"><img src="{{$blocks['DREAMMAIN-7'][0]['photo']}}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(!empty($blocks['DREAMMAIN-8']) && count($blocks['DREAMMAIN-8']))
    <section class="dreamMain--8">
        <div class="container">
            <div class="dreamInfo--2">
                <div class="row align-items-center">
                    <div class="col-md-8 col-16">
                        <div class="image" style="background-image:url({{$blocks['DREAMMAIN-8'][0]['photo']}});"><img src="{{$blocks['DREAMMAIN-8'][0]['photo']}}" alt=""></div>
                    </div>
                    <div class="col-md-8 col-16">
                        <div class="info">
                            <p>{!! $blocks['DREAMMAIN-8'][0]['description'] !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(!empty($blocks['DREAMMAIN-9']) && count($blocks['DREAMMAIN-9']))
    <section class="dreamMain--9">
        <div class="container">
            <div class="info">
                <h4>{!! $blocks['DREAMMAIN-9'][0]['description'] !!}</h4>
                <p>{!! $blocks['DREAMMAIN-9'][0]['name'] !!}</p>
            </div>
        </div>
    </section>
    @endif

    @if(!empty($blocks['DREAMMAIN-10']) && count($blocks['DREAMMAIN-10']))
    <section class="dreamMain--10">
        <div class="container">
            <div class="dreamMain--10__info">
                <div class="dreamMain--10__inner">
                    <div class="sliderImg" id="DREAMMAIN-10">
                        @foreach($blocks['DREAMMAIN-10'][0]->children as $dr)
                        <div>
                            <div class="sliderImg__inner" style="background-image:url({{$dr->photo}});"><img src="{{$dr->photo}}" alt=""></div>
                        </div>
                        @endforeach
                    </div>
                    <div class="sliderNav" id="DREAMMAIN-10-nav">
                        @foreach($blocks['DREAMMAIN-10'][0]->children as $dr)
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
    </section>
    @endif

    @if(!empty($blocks['DREAMMAIN-11']) && count($blocks['DREAMMAIN-11']))
    <section class="dreamMain--6">
        <div class="container">
            <div class="dreamInfo">
                <div class="row align-items-center">
                    <div class="col-md-9 col-16">
                        <div class="dreamInfo__img" style="background-image:url({{$blocks['DREAMMAIN-11'][0]['photo']}});"><img src="{{$blocks['DREAMMAIN-11'][0]['photo']}}" alt=""></div>
                    </div>
                    <div class="col-md-7 col-16">
                        <div class="dreamInfo__des">
                            <h4>{!! $blocks['DREAMMAIN-11'][0]['name'] !!}</h4>
                            <p>{!! $blocks['DREAMMAIN-11'][0]['description'] !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(!empty($blocks['DREAMMAIN-12']) && count($blocks['DREAMMAIN-12']))
    <section class="dreamMain--7">
        <div class="container">
            <div class="dreamInfo">
                <div class="row align-items-center">
                    <div class="col-md-7 col-16">
                        <div class="dreamInfo__des">
                            <h4>{!! $blocks['DREAMMAIN-12'][0]['name'] !!}</h4>
                            <p>{!! $blocks['DREAMMAIN-12'][0]['description'] !!}</p>
                        </div>
                    </div>
                    <div class="col-md-9 col-16">
                        <div class="dreamInfo__img" style="background-image:url({{$blocks['DREAMMAIN-12'][0]['photo']}});"><img src="{{$blocks['DREAMMAIN-12'][0]['photo']}}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
