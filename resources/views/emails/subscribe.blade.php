<!DOCTYPE html>
<html lang="vi">
<head></head>
<body style="text-align: center; position: relative;background-color: #f5f8fa;">
<div style="margin: 50px auto;width: 80%; position: absolute;margin: auto; left: 0;right: 0;font-family: sans-serif;border-radius: 4px;background: #fff;border: 1px solid #e1e8ed;padding: 10px;">
    <div style="text-align: center; margin-bottom: 20px">
        <a href="{{url('')}}" style="text-decoration:none"
           target="_blank"><img src="{{asset('assets/images/logo.png')}}"
                                style="max-width: 145px;">
        </a>
    </div>
    <div style="text-align: justify;margin-bottom: 22px;border: 1px solid beige;padding: 5px;border-radius: 5px;">
        <p>Vừa có một khách hàng đăng ký nhận tin từ website {{url('')}}: <span style="color:blue">{{ $email or 'example@gmail.com'}}</span></p>
    </div>
    <span> <a href="{{url('')}}" style="text-decoration:none;font-family: 'Helvetica Neue Light',Helvetica,Arial,sans-serif;color:#8899a6;font-size:12px;font-weight:normal;">Copyright © EC. 2018 • All rights reserved.</a> </span>
</div>

</body>
</html>