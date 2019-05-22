@extends('frontend.layouts.master')

@section('style')
    <!-- Template's stylesheets -->
    <link rel="stylesheet" href="assets/frontend/js/megamenu/stylesheets/screen.css">
    <link rel="stylesheet" href="assets/frontend/css/theme-default.css" type="text/css">
    <link rel="stylesheet" href="assets/frontend/js/loaders/stylesheets/screen.css">
    <link rel="stylesheet" href="assets/frontend/css/corporate.css" type="text/css">
    <link rel="stylesheet" href="assets/frontend/fonts/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/frontend/fonts/Simple-Line-Icons-Webfont/simple-line-icons.css"
          media="screen"/>
    <link rel="stylesheet" href="assets/frontend/fonts/et-line-font/et-line-font.css">
@endsection

@section('content')
    <section class="sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12 section-white">
                    <ul class="pages-sidebar-links">
                        @if(!empty($blocks['TERMS']) && count($blocks['TERMS']))
                            <li><a class="active scroll" data-scroll="terms" href="#">{{$blocks['TERMS'][0]['name']}}</a></li>
                        @endif

                        @if(!empty($blocks['CONDITIONS']) && count($blocks['CONDITIONS']))
                            <li><a class="scroll" data-scroll="conditions" href="#conditions">{{$blocks['CONDITIONS'][0]['name']}}</a></li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-9">
                    @if(!empty($blocks['TERMS']) && count($blocks['TERMS']))
                        <div id="terms">
                            <h4>{{$blocks['TERMS'][0]['name']}}</h4>
                            <p>{!! $blocks['TERMS'][0]['content'] !!}</p>
                            <div class="col-divider-margin-3"></div>
                            <div class=" divider-line dashed dark margin opacity-3"></div>
                            <div class="col-divider-margin-3"></div>
                        </div>
                    @endif

                    @if(!empty($blocks['CONDITIONS']) && count($blocks['CONDITIONS']))
                        <div id="conditions">
                            <h4>{{$blocks['CONDITIONS'][0]['name']}}</h4>
                            <p>{!! $blocks['CONDITIONS'][0]['content'] !!}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
@endsection

@section('script')
    <script>
        $('.scroll').click(function (e) {
            e.preventDefault();
            $('.scroll.active').removeClass('active');
            $(this).addClass('active');
            let $element = $(this).data('scroll');
            $('html, body').animate({
                scrollTop: $('#'+$element).offset().top
            }, 500);
        });
    </script>
@endsection