<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Application email</title>
</head>
<body>
<center>
    <div style="background: #fafafa; padding: 15px;" border="0" cellpadding="0" cellspacing="0">
        <table width="600" align="center">
            <tr>
                <td align="center" valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                        <tr>
                            <td align="center" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" width="600">
                                    <tr>
                                        <td align="center" valign="top">
                                            <p style="text-align: left">
                                                Xin Chào {{ $input['first_name'].' '.$input['last_name'] }},
                                            </p>

                                            <p style="text-align: left">
                                                Cảm ơn bạn đã liên hệ với {{url('')}}. Chúng tôi xin xác nhận lại thông tin của bạn như sau:
                                            </p>
                                            <div style="padding-left:15px;text-align: left">{{ trans('f_career.name') }}: {{ $input['first_name'].' '.$input['last_name'] }}</div>
                                            <div style="padding-left:15px;text-align: left">{{ trans('f_career.email') }}: {{ $input['email'] }}</div>
                                            <div style="padding-left:15px;text-align: left">{{ trans('f_career.position') }}: {{ $input['position'] }}</div>
                                            <div style="padding-left:15px;text-align: left">{{ trans('f_career.phone') }}: {{ $input['phone'] }}</div>

                                            <p style="text-align: left">
                                                Nhân viên chăm sóc khách hàng của chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất. Trong thời gian chờ đợi, nếu bạn cần thêm yêu cầu hoặc cần hỗ trợ, vui lòng liên hệ trực tiếp với {{url('')}} qua số điện thoại: {{System::content('phone')}},  {{System::content('phone_bottom')}} hoặc Email: {{System::content('contact_email')}}
                                            </p>

                                            <p>&nbsp;&nbsp;</p>

                                            <p style="text-align: left">
                                                Cảm ơn {{ $input['first_name'].' '.$input['last_name'] }},
                                                <br>
                                                Nhóm Chăm sóc khách hàng
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</center>
</body>
</html>