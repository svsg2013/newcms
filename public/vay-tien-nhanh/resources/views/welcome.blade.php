<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EASY CREDIT - VAY TIÊU DÙNG TÍN CHẤP | EASY CREDIT - VAY TIÊU DÙNG TÍN CHẤP</title>
		<meta name="description" content="EASY CREDIT cung cấp các sản phẩm vay tiêu dùng tín chấp với lãi suất cạnh tranh và thủ tục giải ngân nhanh chóng, dễ dàng. Liên hệ ngay: 1900 1066 hoặc *1066 để đăng ký vay"/>
		<meta name="keywords" content="easy credit, easycredit, vay tiêu dùng, vay tín chấp, vay trả góp, vay tiền mặt, vay theo lương, vay theo cmnd, vay theo hộ khẩu"/>
		<meta property="og:title" content="EASY CREDIT - VAY TIÊU DÙNG TÍN CHẤP"/>
		<meta property="og:description" content="EASY CREDIT cung cấp các sản phẩm vay tiêu dùng tín chấp với lãi suất cạnh tranh và thủ tục giải ngân nhanh chóng, dễ dàng. Liên hệ ngay: 1900 1066 hoặc *1066 để đăng ký vay"/>
		<link rel="shortcut icon" href="{{asset('static/favicon.ico')}}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Easycredit
                </div>

                <div class="links">
                    <a href="{{route('indexversionone')}}">Layout 1</a>
                    <a href="{{route('indexversiontwo')}}">Layout 2</a>
                    <a href="{{url('/admin')}}">Admin</a>
                </div>
            </div>
        </div>
    </body>
</html>
