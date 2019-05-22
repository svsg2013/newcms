@extends('frontend.layouts.master')

@section('content')

@if(!empty($blocks['NEWS-PROMOTIONS-BANNER'][0]))
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url({!! $blocks['NEWS-PROMOTIONS-BANNER'][0]->photo !!})" data-paroller-factor="0.4"
    data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <h1>{!! $blocks['NEWS-PROMOTIONS-BANNER'][0]->name !!}</h1>

        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
@endif

<section class="boxquote">
    <div class="container text-center">
        <h2 class="boxquote_head">{!! !empty($blocks['NEWS-PROMOTIONS-GENERAL'][0]) ? $blocks['NEWS-PROMOTIONS-GENERAL'][0]->name : '' !!}</h2>
        <div class="boxquote_content">
            {!! !empty($blocks['NEWS-PROMOTIONS-GENERAL'][0]) ? $blocks['NEWS-PROMOTIONS-GENERAL'][0]->description : '' !!}
        </div>
    </div>
</section>
<section class="promotionPage">
    <div class="container">
        <div class="promotionIntro">
            <div class="promotionIntro__image" data-animated-effect="fadeInLeft">
                <div class="image imageEffect">
                    <a style="background-image:url('{!! !empty($blocks['NEWS-PROMOTIONS-GENERAL-DETAIL'][0]) ? $blocks['NEWS-PROMOTIONS-GENERAL-DETAIL'][0]->photo : '' !!}')" href="#">
                        <img src="{!! !empty($blocks['NEWS-PROMOTIONS-GENERAL-DETAIL'][0]) ? $blocks['NEWS-PROMOTIONS-GENERAL-DETAIL'][0]->photo : '' !!}" alt="">
                    </a>
                </div>
            </div>
            <div class="promotionIntro__info">
                <div class="promotionIntro__content" data-animated-effect="fadeInUp" data-animated-delay="200">
                    <a href="{!! !empty($blocks['NEWS-PROMOTIONS-GENERAL-DETAIL'][0]) ? $blocks['NEWS-PROMOTIONS-GENERAL-DETAIL'][0]->url : '' !!}">{!! !empty($blocks['NEWS-PROMOTIONS-GENERAL-DETAIL'][0]) ? $blocks['NEWS-PROMOTIONS-GENERAL-DETAIL'][0]->name : '' !!}</a>
                    {!! !empty($blocks['NEWS-PROMOTIONS-GENERAL-DETAIL'][0]) ? $blocks['NEWS-PROMOTIONS-GENERAL-DETAIL'][0]->content : '' !!}
                </div>
                <div class="promotionIntro__video" data-animated-effect="fadeInUp" data-animated-delay="200">
                    <div class="text-center">
                        <a class="btn btn-danger btn-shadow btn-lg btn-shadowjs" href="{!! !empty($blocks['NEWS-PROMOTIONS-GENERAL-DETAIL'][0]) ? $blocks['NEWS-PROMOTIONS-GENERAL-DETAIL'][0]->url : '' !!}"><span class="text">xem chi tiết</span></a>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <br />

        @if(empty($result))
            <div class="promotionGrid gridGroup">
                @if(!empty($news_top))
                @foreach($news_top as $key => $new)
                <div class="gridGroup__wrap" data-animated-effect="fadeInUp" data-animated-delay="{{ $key*150 }}">
                    <div class="gridGroup__item">
                        <div class="gridGroup__item__image">
                            <div class="image imageEffect">
                                <a style="background-image:url('{{ $new->image }}')" href="{{ route('frontend.news.promitions.show', $new->slug) }}">
                                    <img src="{{ $new->image }}" alt="{{ $new->title }}">
                                </a>
                            </div>
                        </div>
                        <div class="gridGroup__item__info">
                            <h4>
                                <a href="{{ route('frontend.news.promitions.show', $new->slug) }}">{{ $new->title }}</a>
                            </h4>
                            <p>{{ words($new->description, 30, '...') }}</p>
                            <div class="gridGroup__item__link">
                                <a class="read-more" href="{{ route('frontend.news.promitions.show', $new->slug) }}">
                                    <span>Xem chi tiết</span>
                                </a>
                                <div class="date-news">{{ $new->publish_at }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            @if(!empty($news_video) && count($news_video))
            <div class="promotionGrid gridGroup promotionGrid--video">
                @foreach($news_video as $key => $new)
                    @if(!$new->video)
                        @continue
                    @endif
                @php
                    preg_match('/(?:.*\/v\/|.*v\=|\.be\/)([A-Za-z0-9_\-]{11})/', $new->video, $video, PREG_OFFSET_CAPTURE, 0);
                @endphp
                <div class="gridGroup__wrap" data-animated-effect="fadeInUp" data-animated-delay="{{ $key*150 }}">
                    <div class="gridGroup__item">
                        <div class="gridGroup__item__image">
                            <div class="image imageEffect" style="background-image:url('{{ $new->image }}')">
                                <img src="{{ $new->image }}">
                            </div>
                            <a class="playVideo" href="javascript:void(0)" id="play0{{($key + 1)}}"></a>
                            <iframe class="videoInner" id="video0{{($key + 1)}}" width="100%" height="100%" src="https://www.youtube.com/embed/{{ !empty($video[1][0]) ? trim($video[1][0]) : '' }}?enablejsapi=1&showinfo=0&rel=0"
                                frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen=""></iframe>
                        </div>
                        <div class="gridGroup__item__info">
                            <h4>
                                <a href="{{ route('frontend.news.promitions.show', $new->slug) }}">{{ $new->title }}</a>
                            </h4>
                            <p>{{ words($new->description, 40, '...') }}</p>
                            <div class="gridGroup__item__link">
                                <a class="read-more" href="{{ route('frontend.news.promitions.show', $new->slug) }}">
                                    <span>xem chi tiết</span>
                                </a>
                                <div class="date-news">{{ $new->publish_at }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <script>
                    var player01;
                    var player02;
                    function onYouTubePlayerAPIReady() {

                        player01 = new YT.Player('video01', {
                            events: {
                                'onReady': onPlayerReady,
                                'onStateChange': onPlayerStateChange
                            }
                        });

                        player02 = new YT.Player('video02', {
                            events: {
                                'onReady': onPlayerReady,
                                'onStateChange': onPlayerStateChange
                            }
                        });
                    }
                    function onPlayerReady(event) {

                        var playButton01 = document.getElementById("play01");
                        playButton01.addEventListener("click", function () {
                            player01.playVideo();
                            this.parentElement.className += " showvideo";
                        });

                        var playButton02 = document.getElementById("play02");
                        playButton02.addEventListener("click", function () {
                            player02.playVideo();
                            this.parentElement.className += " showvideo";
                        });
                    }
                    function onPlayerStateChange(event) {
                        switch (event.data) {
                            case 0:
                                event.target.a.parentElement.classList.remove("showBtn");
                                event.target.a.parentElement.classList.remove("showvideo");
                                break;
                            case 2:
                                //- case 3:
                                event.target.a.parentElement.className += " showBtn";
                                break;
                            case 1:
                                event.target.a.parentElement.classList.remove("showBtn");
                                break;
                        };
                    };
                </script>
            </div>
            @endif
            <div class="promotionGrid gridGroup">
                @if(!empty($news))
                @foreach($news as $key => $new)
                <div class="gridGroup__wrap" data-animated-effect="fadeInUp" data-animated-delay="{{ $key*150 }}">
                    <div class="gridGroup__item">
                        <div class="gridGroup__item__image">
                            <div class="image imageEffect">
                                <a style="background-image:url('{{ $new->image }}')" href="{{ route('frontend.news.promitions.show', $new->slug) }}">
                                    <img src="{{ $new->image }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="gridGroup__item__info">
                            <h4>
                                <a href="{{ route('frontend.news.promitions.show', $new->slug) }}">{{ $new->title }}</a>
                            </h4>
                            <p>{{ words($new->description, 30, '...') }}</p>
                            <div class="gridGroup__item__link">
                                <a class="read-more" href="{{ route('frontend.news.promitions.show', $new->slug) }}">
                                    <span>Xem chi tiết</span>
                                </a>
                                <div class="date-news">{{ $new->publish_at }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        @endif
        
        <!-- Kết quả search -->
        @if(!empty($result) && count($result))
            <div class="promotionGrid gridGroup">
                @foreach($result as $key => $new)
                <div class="gridGroup__wrap" data-animated-effect="fadeInUp" data-animated-delay="{{ $key*150 }}">
                    <div class="gridGroup__item">
                        <div class="gridGroup__item__image">
                            <div class="image imageEffect">
                                <a style="background-image:url('{{ $new->image }}')" href="{{ route('frontend.news.promitions.show', $new->slug) }}">
                                    <img src="{{ $new->image }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="gridGroup__item__info">
                            <h4>
                                <a href="{{ route('frontend.news.promitions.show', $new->slug) }}">{{ $new->title }}</a>
                            </h4>
                            <p>{{ words($new->description, 30, '...') }}</p>
                            <div class="gridGroup__item__link">
                                <a class="read-more" href="{{ route('frontend.news.promitions.show', $new->slug) }}">
                                    <span>Xem chi tiết</span>
                                </a>
                                <div class="date-news">{{ $new->publish_at }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
        
        <!-- Nếu kết quả rỗng -->
        @if(!empty($result) && count($result) == 0)
            <h3 style="text-align: center">Không có kết quả tìm kiếm</h3>
        @endif

        <div class="promotionLink">
            <a class="btn btn-primary btn-shadow btn-shadowjs click-go-to-footer-input" data-animated-effect="fadeInLeft" style="color: #fff">ĐĂNG KÝ</a>
            <span data-animated-effect="fadeInRight">
                {!! $blocks['NEWS-PROMOTIONS-SIGN-UP'][0]->name !!}
            </span>
        </div>
    </div>
</section>

@if(!empty($blocks['NEWS-PROMOTIONS-FOOTER'][0]))
<section class="getStarted" style="background-image: url('{!! $blocks['NEWS-PROMOTIONS-FOOTER'][0]->photo !!}')" data-waypoint="70%" data-paroller-factor="0.4"
    data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container">
        <h2 class="heading heading--white">{!! $blocks['NEWS-PROMOTIONS-FOOTER'][0]->name !!}</h2>
        <div class="text-center">
            <a class="btn btn-danger btn-shadow btn-lg @if($composer_active_popup == true) btn-loan-stop @endif" href="@if($composer_active_popup == false) {!! $blocks['NEWS-PROMOTIONS-FOOTER'][0]->url !!} @endif">nhận khoản vay</a>
        </div>
    </div>
</section>
@endif

<div class="modal fade peoplePopupInner" id="videoPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="close closepopup " type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            @php
                preg_match('/(?:.*\/v\/|.*v\=|\.be\/)([A-Za-z0-9_\-]{11})/', !empty($blocks['NEWS-PROMOTIONS-GENERAL-DETAIL'][0]) ? $blocks['NEWS-PROMOTIONS-GENERAL-DETAIL'][0]->url : '', $matches, PREG_OFFSET_CAPTURE, 0);
            @endphp
            <iframe width="100%" height="500px" src="https://www.youtube.com/embed/{{ !empty($matches[1][0]) ? trim($matches[1][0]) : '' }}?enablejsapi=1&showinfo=0" frameborder="0"
                gesture="media" allow="encrypted-media" allowfullscreen=""></iframe>
        </div>
    </div>
</div>

@endsection