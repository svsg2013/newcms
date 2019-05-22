<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact email</title>
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
                                                Hello {{ $input['name'] }},
                                            </p>

                                            <p style="text-align: left">
                                                Cảm ơn {{ $input['name'] }} đã liên hệ với Ban Nhân Sự của Easycredit. Chúng tôi xin xác nhận lại thông tin của bạn như sau:
                                            </p>

                                            <div style="padding-left:15px;text-align: left">- Tên: {{ $input['name'] }}</div>
                                            <div style="padding-left:15px;text-align: left">- Số điện thoại: {{ $input['phone'] }}</div>
                                            <div style="padding-left:15px;text-align: left">- E-mail: {{ $input['email'] }}</div>
                                            <div style="padding-left:15px;text-align: left">- Tiêu đề: {{ $input['subject'] }}</div>
                                            <div style="padding-left:15px;text-align: left">- Lời nhắn: {{ $input['content'] }}</div>

                                            <p style="text-align: left">
                                                Nhân sự phụ trách của chúng tôi sẽ liên hệ lại với anh/chị trong thời gian sớm nhất. Trong thời gian chờ đợi, nếu anh/ chị cần thêm yêu cầu hoặc cần hỗ trợ, vui lòng liên hệ trực tiếp với Ban Nhân Sự Easycredit qua số hotline 0948.079.360 hoặc email: career@easycredit.vn
                                            </p>

                                            <p>&nbsp;&nbsp;</p>

                                            <p style="text-align: left">
                                                Cảm ơn {{ $input['name'] }},
                                                <br>
                                                Ban Nhân Sự Easycredit
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