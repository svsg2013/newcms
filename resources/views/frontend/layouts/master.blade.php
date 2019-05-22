<!DOCTYPE html>
<html lang="{{ $composer_locale }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{asset('/')}}">
    @section("seo")
        @include('frontend.layouts.partials.meta')
    @show

    <link href="{{ getAssetResourceVersion('assets/css/styles.css') }}" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon.ico">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/images/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon.ico">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.ico">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="manifest" href="assets/manifest.json">
    <meta name="msapplication-TileColor" content="#f05b28">
    <meta name="msapplication-TileImage" content="assets/images/favicon.ico">
    <meta name="theme-color" content="#f05b28">

    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;amp;subset=vietnamese" rel="stylesheet">

    <link rel="stylesheet" href="assets/plugins/jquery-confirm/jquery-confirm.min.css">

    <link rel="stylesheet" href="/assets/css/loading.css"/>
    <link rel="stylesheet" href="/assets/css/custom.css"/>
    @yield('style')

    <!-- Hidden Button chat default -->
    <style type="text/css">
        #iframe-designstudio-button {
            display: none!important;
        }
    </style>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WVP4HKT');</script>
    <!-- End Google Tag Manager -->
@if (!\Request::is('/'))
<!-- Hotjar Tracking Code for easycredit.vn -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1204454,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>    
@endif
</head>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WVP4HKT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
@include('frontend.layouts.partials.header')

<main class="wrapper">
    @yield('content')
</main>

@include('frontend.layouts.partials.footer')

@include('frontend.popup-loan')

<!-- Loading AJAX -->
<div class="nhan-loading" id="loading"></div>

<script type="text/javascript">
    const URL_JOB = '{{ route("url.job") }}';
    const URL_DOC = '{{ route("url.doc") }}';
    const URL_LOAN = '{{ route("url.loan") }}';
    const URL_LOAN_NOT_API = '{{ route("url.loan.not.api") }}';
    const URL_GET_COMBO = '{{ route("url.get.combo") }}';
    const URL_SUBSCRIBE = '{{ route("url.subscribe") }}';
    const URL_SUBCRIBE_NEWS = '{{ route("url.subscribe") }}';
    
    const COMPOSER_ACTIVE_POPUP = '{{ $composer_active_popup }}';
</script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{getAssetResourceVersion('assets/js/library.js')}}"></script>
<script src="{{getAssetResourceVersion('assets/js/main.js')}}"></script>
<script src="{{getAssetResourceVersion('assets/js/loan.js')}}"></script>

<script>
    // only for demo purposes
        // $.validator.setDefaults({
        //     submitHandler: function() {
        //         $('#successModal').modal('show')
        //     }
        // });
</script>

<script src="assets/plugins/jquery-confirm/jquery-confirm.min.js"></script>

@include('frontend.layouts.partials.alert_modal')

@stack("add_script")

@yield('script')

{!! System::content('chat_script', null) !!}

<script type="text/javascript">
    $('.chat-script-btn').click(function(){
        var $iframe = $("#iframe-designstudio-button").contents();
        $("body", $iframe).trigger("click");
    });
</script>

</body>
</html>
