<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags-->
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="/assets/coming-soon/favicon.png" rel="icon">
    <title>Easy Credit</title>
    <link href="/assets/coming-soon/css/plugin.css" rel="stylesheet">
    <link href="/assets/coming-soon/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/coming-soon/plugins/jquery-confirm/jquery-confirm.min.css">
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body class="page">
<div class="mainpage">
    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="/"><img src="/assets/coming-soon/img/logo.svg" atl=""> </a>
            </div>
        </div>
        <div class="tagline">
            <!-- <h3>We are <span>coming soon.</span></h3> -->
            <h3 style="font-family: 'arial'; font-size: 40px;">RẤT TIẾC, NỘI DUNG KHÔNG TỒN TẠI. </br> BẠN SẼ ĐƯỢC ĐƯA VỀ TRANG CHỦ SAU </br><span class="count-down-redirect">6</span><span>S</span></h3>
        </div>
        <div class="footer">
            <div class="footer__info">
                <p>EASY CREDIT là Khối Tín dụng Tiêu dùng của Chi nhánh TP.HCM<br/>
                    Công ty Tài chính Cổ phần Điện lực (TP. Hà Nội)</p>
            </div>
            <div class="footer__info-2">
                <p>Bản quyền thuộc về Công ty Tài chính Cổ phần Điện lực Chi nhánh TP.HCM.<br/>Bản quyền đã được bảo hộ</p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/assets/coming-soon/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/coming-soon/js/plugin.js"></script>
<script type="text/javascript" src="/assets/coming-soon/js/main.js"></script>
<script src="/assets/coming-soon/plugins/jquery-confirm/jquery-confirm.min.js"></script>

<script>
    const URL_HOME_PAGE = '{{ route("page.home") }}';
    var time = 6;

    var setInterval = setInterval(function () {
        time--;
        $('.count-down-redirect').html(time);
        if (time === 0) {
            clearInterval(setInterval);
            window.location.href = URL_HOME_PAGE;
        }
    }, 1000);
</script>
</body>
</html>