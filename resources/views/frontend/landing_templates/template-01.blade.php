@php
    $meta_data = !empty($partner->templateData) && !empty($partner->templateData->meta_data) ? $partner->templateData->meta_data : [];
    $extra_data = !empty($partner->templateData) && !empty($partner->templateData->extra_data) ? $partner->templateData->extra_data : [];



    $banners = [
        'pc' => [
            '/landing_templates/static/layout-1/img/pc/1.jpg',
            '/landing_templates/static/layout-1/img/pc/2.jpg',
        ],
        'laptop' => [
            '/landing_templates/static/layout-1/img/laptop/1.jpg',
            '/landing_templates/static/layout-1/img/laptop/2.jpg',
        ],
        'tablet' => [
            '/landing_templates/static/layout-1/img/tablet/1.jpg',
            '/landing_templates/static/layout-1/img/tablet/2.jpg',
        ],
        'mobile' => [
            '/landing_templates/static/layout-1/img/mobile/1.jpg',
            '/landing_templates/static/layout-1/img/mobile/2.jpg',
        ],
    ];

    $sliders = [
        'pc' => [
            [
                'image' => '/landing_templates/static/layout-1/img/pc/low-4.jpg',
                'title' => 'Hoàn tiền lên tới 20% khi bạn trả đúng hạn',
                'content' => '<ul class="desc">
                    <li>Thanh toán đầy đủ và đúng hạn các ký thanh toán, không bị quá hạn gốc và lãi</li>
                    <li>Không thay đổi thời hạn thanh toán và duy trì khoảng vay trong suốt thời hạn vay</li>
                    <li class="link">
                        <a href="https://easycredit.vn/upload/files/Chuong-Trinh-Uu-Dai.pdf" target="_blank" class="font-italic">
                            <u>Xem thêm chi tiết</u>
                        </a>
                    </li>
                </ul>'
            ],

            [
                'image' => '/landing_templates/static/layout-1/img/pc/low-1.jpg',
                'title' => '3 bước đơn giản để nhận khoản vay',
                'content' => '<ul class="desc">
                    <li>Đăng ký thông tin</li>
                    <li>Các nhân viên chúng tôi sẽ liên hệ và hỗ trợ bạn khi cần!</li>
                    <li>Ký hợp đồng và nhận khoản vay</li>
                </ul>'
            ],

            [
                'image' => '/landing_templates/static/layout-1/img/pc/low-2.jpg',
                'title' => 'Khách hàng của chúng tôi',
                'content' => '<ul class="desc">
                    <li>Công dân Việt Nam</li>
                    <li>Độ tuổi từ 20 đến 60 tuổi </li>
                    <li>Thu nhập từ 4.5 triệu đồng/tháng</li>
                </ul>'
            ],

            [
                'image' => '/landing_templates/static/layout-1/img/pc/low-3.jpg',
                'title' => 'Giấy tờ đơn giản',
                'content' => '<ul class="desc">
                    <li>Chỉ cần CMND/Thẻ CCCD và 01 trong 03 loại giấy tờ tùy thân. Bạn có thể đăng kí khoản vay phù hợp tại EASY CREDIT.</li>
                </ul>'
            ]
        ],

        'tablet' => [
            [
                'image' => '/landing_templates/static/layout-1/img/tablet/low-4.jpg',
                'title' => 'Hoàn tiền lên tới 20% khi bạn trả đúng hạn',
                'content' => '<ul class="desc">
                    <li>Thanh toán đầy đủ và đúng hạn các ký thanh toán, không bị quá hạn gốc và lãi</li>
                    <li>Không thay đổi thời hạn thanh toán và duy trì khoảng vay trong suốt thời hạn vay</li>
                    <li class="link">
                        <a href="https://easycredit.vn/khuyen-mai" target="_blank" class="font-italic">
                            <u>Xem thêm chi tiết</u>
                        </a>
                    </li>
                </ul>'
            ],

            [
                'image' => '/landing_templates/static/layout-1/img/tablet/low-1.jpg',
                'title' => '3 bước đơn giản để nhận khoản vay',
                'content' => '<ul class="desc">
                    <li>Đăng ký thông tin</li>
                    <li>Các nhân viên chúng tôi sẽ liên hệ và hỗ trợ bạn khi cần!</li>
                    <li>Ký hợp đồng và nhận khoản vay</li>
                </ul>'
            ],

            [
                'image' => '/landing_templates/static/layout-1/img/tablet/low-2.jpg',
                'title' => 'Khách hàng của chúng tôi',
                'content' => '<ul class="desc">
                    <li>Công dân Việt Nam</li>
                    <li>Độ tuổi từ 20 đến 60 tuổi </li>
                    <li>Thu nhập từ 4.5 triệu đồng/tháng</li>
                </ul>'
            ],

            [
                'image' => '/landing_templates/static/layout-1/img/tablet/low-3.jpg',
                'title' => 'Giấy tờ đơn giản',
                'content' => '<ul class="desc">
                    <li>Chỉ cần CMND/Thẻ CCCD và 01 trong 03 loại giấy tờ tùy thân. Bạn có thể đăng kí khoản vay phù hợp tại EASY CREDIT.</li>
                </ul>'
            ]
        ],

        'mobile' => [
            [
                'image' => '/landing_templates/static/layout-1/img/mobile/low-4.jpg',
                'title' => 'Hoàn tiền lên tới 20% khi bạn trả đúng hạn',
                'content' => '<ul class="desc">
                    <li>Thanh toán đầy đủ và đúng hạn các ký thanh toán, không bị quá hạn gốc và lãi</li>
                    <li>Không thay đổi thời hạn thanh toán và duy trì khoảng vay trong suốt thời hạn vay</li>
                    <li class="link">
                        <a href="https://easycredit.vn/khuyen-mai" target="_blank" class="font-italic">
                            <u>Xem thêm chi tiết</u>
                        </a>
                    </li>
                </ul>'
            ],

            [
                'image' => '/landing_templates/static/layout-1/img/mobile/low-1.jpg',
                'title' => '3 bước đơn giản để nhận khoản vay',
                'content' => '<ul class="desc">
                    <li>Đăng ký thông tin</li>
                    <li>Các nhân viên chúng tôi sẽ liên hệ và hỗ trợ bạn khi cần!</li>
                    <li>Ký hợp đồng và nhận khoản vay</li>
                </ul>'
            ],

            [
                'image' => '/landing_templates/static/layout-1/img/mobile/low-2.jpg',
                'title' => 'Khách hàng của chúng tôi',
                'content' => '<ul class="desc">
                    <li>Công dân Việt Nam</li>
                    <li>Độ tuổi từ 20 đến 60 tuổi </li>
                    <li>Thu nhập từ 4.5 triệu đồng/tháng</li>
                </ul>'
            ],

            [
                'image' => '/landing_templates/static/layout-1/img/mobile/low-3.jpg',
                'title' => 'Giấy tờ đơn giản',
                'content' => '<ul class="desc">
                    <li>Chỉ cần CMND/Thẻ CCCD và 01 trong 03 loại giấy tờ tùy thân. Bạn có thể đăng kí khoản vay phù hợp tại EASY CREDIT.</li>
                </ul>'
            ]
        ]
    ];


    $introduction = [
        'heading' => !empty($extra_data['introduction']) && !empty($extra_data['introduction']['heading']) ? $extra_data['introduction']['heading'] : 'Tại sao chọn <strong>Easy Credit ?</strong>',
        'blocks' => [
            [
                'image' => '/landing_templates/static/layout-1/img/desc-1.png',
                'title' => 'Thủ tục <br/>nhanh gọn và dễ dàng',
                'content' => 'Đăng ký nhanh gọn, xét duyệt đơn giản và hoàn trả dễ dàng. Hỗ trợ tài chính trong 24 giờ. Hỗ trợ cho vay từ 10 triệu đến 90 triệu với thời gian hoàn trả từ 6 đến 60 tháng (tùy theo nghề nghiệp và hồ sơ cung cấp)'
            ],

            [
                'image' => '/landing_templates/static/layout-1/img/desc-2.png',
                'title' => 'Giấy tờ <br/> đơn giản',
                'content' => 'Chỉ cần Chứng minh nhân dân hoặc Thẻ Căn Cước công dân và 01 trong 03 loại giấy tờ tùy thân, bạn có thể đăng ký khoản vay phù hợp nhất tại EASY CREDIT.'
            ],

            [
                'image' => '/landing_templates/static/layout-1/img/desc-3.png',
                'title' => 'Lãi suất <br> thấp và minh bạch',
                'content' => 'Cung cấp các giải pháp tài chính với lãi suất hợp lý nhất so với thị trường và minh bạch trong các khoản phí. Đó là cách chúng tôi chia sẻ các nỗi lo về tài chính của bạn. (*Lãi suất từ 1.25% đến 6.08%/tháng tùy theo độ tín nhiệm của khách hàng.)'
            ]
        ]
    ];



    if (!empty($meta_data['banners'])) {
        $mb = $meta_data['banners'];
        array_walk($banners, function (&$item, $idx) use ($mb){
            if (!empty($mb[$idx])) {
                $item = $mb[$idx];
            }
        });
    }

    if (!empty($extra_data['sliders'])) {
        $es = $extra_data['sliders'];
        array_walk($sliders, function (&$item, $idx) use ($es){
            if (!empty($es[$idx])) {
                $item = $es[$idx];
            }
        });
    }

    if (!empty($extra_data['introduction']) && !empty($extra_data['introduction']['blocks'])) {
        $blocks = array_values($extra_data['introduction']['blocks']);
        array_walk($introduction['blocks'], function (&$item, $idx) use ($blocks){
            if (!empty($blocks[$idx])) {
                if (!empty($blocks[$idx]['image'])) {
                    $item['image'] = $blocks[$idx]['image'];
                }
                if (!empty($blocks[$idx]['title'])) {
                    $item['title'] = $blocks[$idx]['title'];
                }
                if (!empty($blocks[$idx]['content'])) {
                    $item['content'] = $blocks[$idx]['content'];
                }
            }
        });
    }


@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>EASY CREDIT - VAY TIÊU DÙNG TÍN CHẤP | EASY CREDIT - VAY TIÊU DÙNG TÍN CHẤP</title>
    <meta name="description" content="EASY CREDIT cung cấp các sản phẩm vay tiêu dùng tín chấp với lãi suất cạnh tranh và thủ tục giải ngân nhanh chóng, dễ dàng. Liên hệ ngay: 1900 1066 hoặc *1066 để đăng ký vay"/>
    <meta name="keywords" content="easy credit, easycredit, vay tiêu dùng, vay tín chấp, vay trả góp, vay tiền mặt, vay theo lương, vay theo cmnd, vay theo hộ khẩu"/>
    <meta property="og:title" content="EASY CREDIT - VAY TIÊU DÙNG TÍN CHẤP"/>
    <meta property="og:description" content="EASY CREDIT cung cấp các sản phẩm vay tiêu dùng tín chấp với lãi suất cạnh tranh và thủ tục giải ngân nhanh chóng, dễ dàng. Liên hệ ngay: 1900 1066 hoặc *1066 để đăng ký vay"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('landing_templates/static/favicon.ico')}}">
    <link href="{{asset('landing_templates/static/layout-1/vendors/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('landing_templates/static/layout-1/vendors/slick/slick-theme.css')}}" rel="stylesheet">
    <link href="{{asset('landing_templates/static/layout-1/css/style.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WVP4HKT');</script>
    <!-- End Google Tag Manager -->


    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WVP4HKT"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @if ($partner->script_content == "")
        <script>
            var AT = {
                cookie_duration: 30, // 30 days
                aff_sid_param: "{{ $partner->script_key }}",
                is_reoccur: 1,

                init: function (options) {
                    this.cookie_duration = options['cookie_duration'] ? options['cookie_duration'] : 30;
                    this.aff_sid_param = options['aff_sid_param'] ? options['aff_sid_param'] : "{{ $partner->script_key }}";
                    this.is_reoccur = options['is_reoccur'] == 0 ? 0 : 1;
                },

                track: function () {
                    var sid = this.get_param(this.aff_sid_param);
                    if (sid) {
                        this.set_cookie("{{ $partner->script_key }}", sid, this.cookie_duration);
                    }
                },

                get_param: function (name, url) {
                    if (!url) url = (window.location != window.parent.location) ? document.referrer : document.location.href;
                    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
                    var regexS = "[\\?&]" + name + "=([^&#]*)";
                    var regex = new RegExp(regexS);
                    var results = regex.exec(url);
                    return results == null ? null : results[1];
                },

                set_cookie: function (n, v, e) {
                    var d = new Date();
                    d.setTime(d.getTime() + (e * 24 * 60 * 60 * 1000));
                    var ee = "expires=" + d.toUTCString();
                    cookie_domain = this.cookie_domain || window.location.hostname;
                    document.cookie = n + "=" + v + "; " + ee + ";domain=" + cookie_domain + "; path=/";
                },

                get_cookie: function (cname) {
                    var name = cname + "=";
                    var ca = document.cookie.split(';');
                    for (var i = 0; i < ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) == ' ') c = c.substring(1);
                        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
                    }
                    return "";
                }
            };
        </script>
        <script type="text/javascript">
            AT.init({"campaign_id":417,"is_reoccur": 1,"is_lastclick": 0});
            AT.track();
        </script>
    @else
        {!! $partner->script_content !!}
    @endif







    <script>
        getCookie = function (cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1);
                if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
            }
            return "";
        }
    </script>

</head>
<body>
<header class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="logo text-left"><a href="https://easycredit.vn" target="_blank" title="EasyCredit"><img src="{{asset('landing_templates/static/layout-1/img/logo.png')}}" atl="Logo Easy Credit"></a></div>
                <ul class="block-social text-right">
                    <li class="icon-social"><a href="https://www.facebook.com/EASYCREDIT.VN" target="_blank" title="Facebook"><img src="{{asset('landing_templates/static/layout-1/img/facebook-logo.png')}}" alt="Facebook"></a></li>
                    <li class="icon-social"><a href="https://www.youtube.com/easycreditvn" target="_blank" title="Youtube"><img src="{{asset('landing_templates/static/layout-1/img/youtube-logo.png')}}" alt="Youtube"></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<section class="section-main-slider">
    <div class="main-slider pc">
        @foreach($banners['pc'] as $img)
            <div class="item">
                <div class="image" style="background-image:url('{{ $img }}');"></div>
            </div>
        @endforeach
    </div>
    <div class="main-slider laptop">
        @foreach($banners['laptop'] as $img)
            <div class="item">
                <img src="{{ $img }}">
            </div>
        @endforeach
    </div>
    <div class="main-slider tablet">
        @foreach($banners['tablet'] as $img)
            <div class="item">
                <img src="{{ $img }}">
            </div>
        @endforeach
    </div>
    <div class="main-slider mobile">
        @foreach($banners['mobile'] as $img)
            <div class="item">
                <img src="{{ $img }}">
            </div>
        @endforeach
    </div>
    <div class="form">
        <div class="container">
            <div class="offset-lg-2 col-lg-8 offset-xl-6 col-xl-6 form-box">
                <h4>Nhập thông tin cá nhân</h4>
                @if ($errors->any())
                    <ul class="parsley-errors-list filled" style=" padding: 10px 30px; 0px">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{ $partner->otp_request ? route('landing.action.validate') : route('landing.register_without_send_otp') }}" method="POST" class="parsley-validate" id="registerForm" data-validate="parsley">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="url" value="{{ app('url')->full() }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="inputName" name="fullname" type="text" required data-parsley-maxlength="50" data-parsley-maxlength-message="Vui lòng nhập họ và tên ít hơn 50 ký tự" data-parsley-required-message="Vui lòng nhập Họ và tên" >
                                    <label class="label" for="inputName">Họ và tên có dấu*</label>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="inputId" name="nationalid" type="number" required  data-parsley-pattern="(^[0-9]{9}$)|(^[0-9]{12}$)" data-parsley-pattern-message="Vui lòng nhập CMND có 9 hoặc 12 ký tự" data-parsley-required-message="Vui lòng nhập số CMND" >
                                    <label class="label" for="inputId">Số CMND/Thẻ căn cước*</label>
                                </div>
                                <div class="form-group">
                                    <select class="form-control select" id="inputSalary" name="income_id" required data-placeholder=" "  data-parsley-errors-container="#parsley-id-inputSalary" data-parsley-required-message="Vui lòng nhập thu nhập hàng tháng của bạn" data-value="false" style="display: none;">
                                        <option value=""></option>
                                        @foreach($incomes as $itemIncome)
                                            <option data-warning="{{$itemIncome->warning}}" {{ $itemIncome->selected == true ? 'selected' : '' }} value="{{$itemIncome->id}}" >
                                                {{$itemIncome->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label class="label" for="inputSalary">Thu nhập hàng tháng của bạn*</label><span class="line"></span>
                                    <ul class="parsley-errors-list filled" id="parsley-id-inputSalary"></ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-groups">
                                    <input data-parsley-minimumage="20" data-parsley-minimumage-message="Chỉ hỗ trợ từ 20 tuổi trở lên" class="form-controls" id="inputBirth" name="birthday" onfocus="(this.type='date')" type="text" placeholder="Ngày - Tháng - Năm">
                                    <label class="label" for="inputBirth">Ngày sinh</label>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" data-send-otp="0" id="inputPhone" data-action="{{ route('landing.validatePhone') }}" name="phonenumber" type="number" required data-parsley-length="[10,10]" data-parsley-length-message="Vui lòng nhập SDT có 10 chữ số" data-parsley-required-message="Vui lòng nhập số điện thoại">
                                    <label class="label" for="inputPhone">Số điện thoại*</label>
                                    <ul class="parsley-errors-list filled" id="parsley-input-phone"></ul>
                                </div>
                                <div class="form-group">
                                    <select class="form-control select" id="inputCity" name="district_id" required data-placeholder=" "   data-value="false" data-parsley-errors-container="#parsley-id-inputCity" data-parsley-required-message="Vui lòng nhập nơi bạn đang sống" style="display: none;">
                                        <option value=""></option>
                                        @foreach($districts as $itemDistrict)
                                            <option data-warning="{{$itemDistrict->warning}}" {{ $itemDistrict->selected == true ? 'selected' : '' }} value="{{$itemDistrict->id}}">
                                                {{$itemDistrict->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label class="label" for="inputCity" id="inputCityTitle">Nơi bạn đang sống*</label><span class="line"></span>
                                    <ul class="parsley-errors-list filled" id="parsley-id-inputCity"></ul>
                                </div>
                            </div>
                            <div class="col-md-12" id="moreDescription1">
                                <h4 class="text-uppercase text-center">Nhập tính toán khoản vay</h4>
                            </div>
                            <div class="col-md-6" id="moreDescription2">
                                <h5>Bước 1: Cung cấp giấy tờ</h5>
                                <div class="form-group">
                                    <select data-loan="{{ route('landing.ajax.loan') }}" class="form-control select" id="inputJob" name="career_id" data-placeholder=" " required=""  data-parsley-errors-container="#parsley-id-inputJob" data-parsley-required-message="Vui lòng chọn công việc hiện tại của bạn" data-value="false">
                                        <option value=""></option>
                                        @foreach($careers as $itemCareer)
                                            <option value="{{$itemCareer->id}}">{{$itemCareer->name}}</option>
                                        @endforeach
                                    </select>
                                    <label class="label" for="inputJob">Công việc hiện tại của bạn</label><span class="line"></span>
                                    <ul class="parsley-errors-list filled" id="parsley-id-inputJob"></ul>
                                </div>
                                <div class="form-group">
                                    <select class="form-control select docs-modal" id="inputDoc" name="loan_id" data-placeholder=" " required="" data-value="false"  data-parsley-errors-container="#parsley-id-inputDoc" data-parsley-required-message="Vui lòng chọn loại giấy tờ có thể cung cấp" style="display: none;">
                                        <option value=""></option>
                                    </select>
                                    <label class="label" for="inputDoc">Giấy tờ bạn có thể cung cấp</label><span class="line"></span>
                                    <ul class="parsley-errors-list filled" id="parsley-id-inputDoc"></ul>
                                </div>
                            </div>
                            <div class="col-md-6 disabled" id="moreDescription3">
                                <h5>Bước 2: Tính toán khoản vay</h5>
                                <div class="form-range">
                                    <label for="much-you-need">Khoản vay bạn cần</label><ins><span class="much-you-need-span">50.000.000</span><sup>đ</sup></ins>
                                    <input class="form-control irs-hidden-input" id="much-you-need" name="loan_amount" type="number" data-min="10000000" data-max="90000000" data-from="50000000" data-step="1000000" data-prefix="đ" tabindex="-1" readonly="" style="display:none">
                                </div>
                                <div class="form-range">
                                    <label for="payment-term">Thời hạn vay</label><ins><span class="payment-term-span">20</span><sup>tháng</sup></ins>
                                    <input class="form-control irs-hidden-input" id="payment-term" name="loan_tenure" type="number" data-min="6" data-max="60" data-from="20" data-step="1" data-prefix="t" tabindex="-1" readonly="" style="display:none">
                                </div>
                            </div>
                            <input class="form-control" id="partner-code" name="partner_code" type="hidden" value="{{ $partner->campaign_source }}">
                            <input class="form-control" id="template-id" name="template_id" type="hidden" value="{{ $partner->template->id ?? null }}">
                        </div>
                    </div>
                    <div class="divider text-center" id="moreDescription4"><span class="text-uppercase">Khoản trả hàng tháng</span><b class="result-loan" id="inputMoney">  5.000.000<sup>đ</sup></b></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div id="eresult"></div>
                                <a class="btn btn-warning" href="javascript:window.location.reload(true)" style="display: none;" id="searchMore">Đăng ký lại </a>
                                <button class="btn btn-loan" type="submit" id="registerNow"><img src="{{asset('landing_templates/static/layout-1/img/button.png')}}" alt="Đăng ký ngay"></button>
                                <p class="description" id="description">
                                    Bằng việc đăng ký thông tin, bạn đồng ý cho phép EASY CREDIT và các đối tác của EASY CREDIT quản lý, lưu trữ và sử dụng thông tin mà bạn đã cung cấp nhằm mục đích thẩm định khoản vay, tiếp thị và nghiên cứu thị trường.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <p id="warning" style="display: none;">EASY CREDIT chưa hỗ trợ cho vay với mức thu nhập dưới 4,5 triệu đồng, hoặc tỉnh thành của bạn chưa phù hợp. Bạn có muốn tìm hiểu gói vay khác?</p>
                        <a class="btn btn-warning" href="javascript:window.location.reload(true)" style="display: none;" id="searchMore">Đăng ký lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="section-low-slider">
    <div class="low-slider pc">
        @foreach($sliders['pc'] as $slider)
            <div class="item">
                <img src="{{ $slider['image'] }}">
                <div class="slide-description">
                    <h5 class="title text-uppercase">{{ strip_block_tags($slider['title']) }}</h5>
                    {!! $slider['content'] !!}
                </div>
            </div>
        @endforeach
    </div>
    <div class="low-slider tablet">
        @foreach($sliders['tablet'] as $slider)
        <div class="item">
            <img src="{{ $slider['image'] }}">
            <div class="slide-description">
                <h5 class="title text-uppercase">{{ strip_block_tags($slider['title']) }}</h5>
                {!! $slider['content'] !!}
            </div>
        </div>
        @endforeach

    </div>
    <div class="low-slider mobile">
        @foreach($sliders['mobile'] as $slider)
        <div class="item">
            <img src="{{ $slider['image'] }}">
            <div class="slide-description">
                <h5 class="title text-uppercase">{{ strip_block_tags($slider['title']) }}</h5>
                {!! $slider['content'] !!}
            </div>
        </div>
        @endforeach

    </div>
</section>
<section class="section-choose-ez">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">
                    {!! strip_block_tags($introduction['heading']) !!}
                </h4>
            </div>
        </div>
        <div class="row">
            @foreach($introduction['blocks'] as $block)
                <div class="col-md-4">
                    <div class="desc-box">
                        <div class="image"><img src="{{ $block['image'] }}" alt="Hình ảnh"></div>
                        <h5 class="text-uppercase text-center">{!! strip_block_tags($block['title']) !!}</h5>
                        <p class="desc">{!! strip_block_tags($block['content']) !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<div class="line">
    <img src="{{asset('landing_templates/static/layout-1/img/line.png')}}" alt="line"/>
</div>
<footer class="footer">
    <div class="mid-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <div class="logo text-center"><img src="{{asset('landing_templates/static/layout-1/img/logo-big.png')}}" alt="Logo"></div>
                </div>
                <div class="col-sm-7">
                    <div class="desc"><span><img src="{{asset('landing_templates/static/layout-1/img/A.png')}}" alt="Địa điểm"></span><span>  610 Võ Văn Kiệt, P. Cầu Kho, Quận 1, TP.Hồ Chí Minh</span></div>
                    <div class="desc"><span><img src="{{asset('landing_templates/static/layout-1/img/E.png')}}" alt="Email"></span><span>  info@easycredit.vn</span></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="low-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="description text-center">
                        <h6>
                            <span style="color:#969696"><i>EASY CREDIT là Khối Tín dụng Tiêu dùng của Công Ty Tài chính Cổ phần Điện lực.</i> </span><br>
                            <span style="color:#282828">2018 - © Bản quyền thuộc về EASY CREDIT</span> <br>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="modal fade modalDefalt" id="docsModal" tabindex="-1" role="dialog" aria-labelledby="careerDetail" style="padding-right: 17px;display:none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-header">
                <h5 class="modal-title">HÃY CHỌN BỘ GIẤY TỜ BẠN CÓ THỂ CUNG CẤP</h5>
            </div>
            <div class="modal-body">
                <div class="docsTable" id="data-docsTable">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modalDefalt infoModal show" id="warningModal" tabindex="-1" role="dialog" style="padding-right: 17px; display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <h5 class="modal-title">Hãy chọn công việc hiện tại<br> và giấy tờ bạn có thể cung cấp<br>                    trước khi tính toán khoản vay</h5>
                <a class="btn btn-danger btn-sm btn-shadow btn-shadowjs" href="javascript:void(0)" data-dismiss="modal"><span class="text">Tiếp tục</span></a>
            </div>
            <div class="modal-footer">
                <p></p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modalDefalt infoModal" id="errorsModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <h5 class="modal-title">Bạn vui lòng bổ sung thông tin cá nhân <br> để hoàn tất đăng ký khoản vay.</h5>
                <a class="btn btn-danger btn-sm btn-shadow btn-shadowjs" href="javascript:void(0)" data-dismiss="modal"><span class="text">Tiếp tục</span></a>
            </div>
            <div class="modal-footer">
                <p></p>
            </div>
        </div>
    </div>
</div>
<div class="modal modalDefalt infoModal" id="ajaxerrorsModal" role="dialog" style="">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <h5 class="modal-title" id="error-modal-title">Bạn vui lòng bổ sung thông tin cá nhân <br> để hoàn tất đăng ký khoản vay.</h5>

                <a class="btn btn-danger btn-sm btn-shadow btn-shadowjs" href="javascript:void(0)" data-dismiss="modal"><span class="text">Tiếp tục</span></a>
            </div>
            <div class="modal-footer">
                <p></p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modalDefalt infoModal" id="successModalLoan" tabindex="-1" style="display: none;" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <h5 class="modal-title">Chúng tôi đã nhận được thông tin <br>đăng ký vay và sẽ liên hệ bạn <br>trong
                    thời gian sớm nhất.
                </h5>
                <p><strong>Bạn cần hỗ trợ gấp? </strong></p>
                <a class="btn btn-danger btn-sm btn-shadow btn-shadowjs" href="tel:+841900 1066">
							<span class="text">
								<i>
									<svg class="svg replaced-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 67.81 67.9">
										<defs>
											<style>
												.cls-1 {
                                                    fill: #18408c;
                                                    stroke: #18408c;
                                                    stroke-miterlimit: 10;
                                                    stroke-width: 0.5px;
                                                }
                                                .cls-2 {
                                                    fill: url(#linear-gradient);
                                                }
                                                .cls-3 {
                                                    fill: url(#linear-gradient-2);
                                                }
											</style>
											<lineargradient id="linear-gradient" x1="35.18" y1="22.46" x2="55.57" y2="22.46" gradientUnits="userSpaceOnUse">
												<stop offset="0.35" stop-color="#ee6024"></stop>
												<stop offset="0.55" stop-color="#ec4e26"></stop>
												<stop offset="0.9" stop-color="#e82429"></stop>
											</lineargradient>
											<lineargradient id="linear-gradient-2" x1="35.72" y1="16.04" x2="67.81" y2="16.04" xlink:href="#linear-gradient"></lineargradient>
										</defs>
										<title>ic-call</title>
										<g id="Layer_2" data-name="Layer 2">
											<g id="Isolation_Mode" data-name="Isolation Mode">
												<path class="cls-1" d="M53.67,41.91a6.66,6.66,0,0,0-4.83-2.21A6.88,6.88,0,0,0,44,41.9l-4.51,4.5-1.1-.57c-.51-.26-1-.5-1.41-.76A49,49,0,0,1,25.18,34.36a28.94,28.94,0,0,1-3.85-6.08c1.17-1.07,2.26-2.19,3.31-3.26l1.2-1.21c3-3,3-6.88,0-9.88L21.94,10c-.44-.44-.9-.9-1.33-1.36-.86-.89-1.76-1.8-2.68-2.66a6.76,6.76,0,0,0-4.78-2.1A7,7,0,0,0,8.29,6l0,0-4.86,4.9a10.45,10.45,0,0,0-3.1,6.64A25,25,0,0,0,2.14,28.17,61.48,61.48,0,0,0,13.06,46.39,67.19,67.19,0,0,0,35.43,63.91,34.86,34.86,0,0,0,48,67.63l.9,0a10.76,10.76,0,0,0,8.24-3.54s0,0,.06-.07a32.34,32.34,0,0,1,2.5-2.58c.61-.59,1.24-1.2,1.86-1.84a7.12,7.12,0,0,0,2.16-4.94,6.86,6.86,0,0,0-2.2-4.9Zm5.11,15s0,0,0,0c-.56.6-1.13,1.14-1.74,1.74a37.54,37.54,0,0,0-2.76,2.86,6.88,6.88,0,0,1-5.37,2.27h-.66a31,31,0,0,1-11.14-3.34A63.44,63.44,0,0,1,16,44,58,58,0,0,1,5.76,26.83a20.38,20.38,0,0,1-1.6-8.94,6.55,6.55,0,0,1,2-4.24L11,8.78a3.24,3.24,0,0,1,2.17-1,3.06,3.06,0,0,1,2.08,1l0,0c.87.81,1.7,1.66,2.57,2.56l1.36,1.39,3.9,3.9c1.51,1.51,1.51,2.91,0,4.43-.41.41-.81.83-1.23,1.23-1.2,1.23-2.34,2.37-3.58,3.48,0,0-.06,0-.07.07a2.91,2.91,0,0,0-.74,3.24l0,.13a31.3,31.3,0,0,0,4.61,7.52h0A52.41,52.41,0,0,0,34.85,48.31a19.3,19.3,0,0,0,1.76,1c.51.26,1,.5,1.41.76l.17.1a3.1,3.1,0,0,0,1.41.36,3.05,3.05,0,0,0,2.17-1l4.88-4.88a3.23,3.23,0,0,1,2.16-1.07,2.91,2.91,0,0,1,2.06,1l7.9,7.9c1.47,1.46,1.47,3,0,4.47Zm0,0"></path>
												<path class="cls-2" d="M36.76,16.09a18.38,18.38,0,0,1,15,15,1.92,1.92,0,0,0,1.9,1.6l.33,0a1.93,1.93,0,0,0,1.58-2.23A22.22,22.22,0,0,0,37.43,12.29a1.94,1.94,0,0,0-2.23,1.57,1.91,1.91,0,0,0,1.56,2.23Zm0,0"></path>
												<path class="cls-3" d="M67.78,29.84A36.59,36.59,0,0,0,38,0a1.93,1.93,0,1,0-.63,3.8A32.68,32.68,0,0,1,64,30.47a1.92,1.92,0,0,0,1.9,1.6l.33,0a1.89,1.89,0,0,0,1.57-2.2Zm0,0"></path>
											</g>
										</g>
									</svg>
								</i>
								Gọi ngay
								1900 1066
							</span>
                </a>
            </div>
            <div class="modal-footer">
                <p>Quay về trang chủ sau <span class="countdown-reload">6</span> giây</p>
            </div>
        </div>
    </div>
</div>
@if($partner->otp_request)
    <div class="modal fade modalDefalt" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="careerDetail" style="padding-right: 17px;display:none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div class="modal-header">
                    <h5 class="modal-title">Nhập mã OTP</h5>
                </div>
                <div class="modal-body">
                    <div class="docsTable" id="data-docsTable">
                        <div class="container">
                            <form action="{{ route('landing.action') }}" method="post" id="otp-form">
                                <div class="form-group">
                                    <label for="email">Vui lòng nhập mã OTP:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" autocomplete="off" name="input-otp">
                                        <span class="input-group-btn">
                                        <button class="btn btn-default btn-resend-otp" data-action="{{ route('landing.validatePhone') }}">Gửi lại</button>
                                        <button class="btn btn-primary btn-verify-otp" type="submit" style="display: none">Xác nhận</button>
                                    </span>
                                    </div>
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required" id="otp-error-text" style="font-size: 12px; margin-top: 10px"></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modalDefalt" id="phone-exists-modal" tabindex="-1" role="dialog" aria-labelledby="careerDetail" style="padding-right: 17px;display:none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div class="modal-body" style="margin: 20px 0px; text-align: center">
                    <div class="docsTable" id="data-docsTable">
                        <div class="container phone-exists center">
                            <p class="text-center text-primary">LƯU Ý: SỐ ĐIỆN THOẠI ĐĂNG KÝ ĐÃ TỒN TẠI TRÊN HỆ THỐNG.</p>
                            <p class="text-center text-primary">BẠN VUI LÒNG LIÊN HỆ TỔNG ĐÀI ĐỂ ĐƯỢC HỖ TRỢ</p>
                            <a class="btn btn-success btn-loan" href="tel:19001066">GỌI NGAY 1900 1066</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<div class="modal-backdrop fade" style="display:none;"></div>
<div class="loading-screen" id="loading"></div>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{asset('landing_templates/static/layout-1/vendors/slick/slick.min.js')}}"></script>
<script src="{{asset('landing_templates/static/layout-1/js/library.js')}}"></script>
<script src="{{asset('landing_templates/static/layout-1/js/index.js')}}"></script>
<script src="{{asset('landing_templates/static/parsley.min.js')}}"></script>
<script>
    var autoload = true;
    $(function() {
        $("#inputSalary").on('change',function() {
            if($(this).find(':selected').data('warning') == 1){
                $("#inputCity_chosen").css({'display': 'none'});
                $("#inputCityTitle").css({'display': 'none'});
                $("#registerNow").css({'display': 'none'});
                $("#description").css({'display': 'none'});
                $("#moreDescription1").css({'display': 'none'});
                $("#moreDescription2").css({'display': 'none'});
                $("#moreDescription3").css({'display': 'none'});
                $("#moreDescription4").css({'display': 'none'});
                $("#searchMore").css({'display': 'block'});
                $("#warning").css({'display': 'block'});
            } else {
                $("#inputCity_chosen").css({'display': 'block'});
                $("#inputCityTitle").css({'display': 'block'});
                $("#registerNow").css({'display': 'block'});
                $("#description").css({'display': 'block'});
                $("#moreDescription1").css({'display': 'block'});
                $("#moreDescription2").css({'display': 'block'});
                $("#moreDescription3").css({'display': 'block'});
                $("#moreDescription4").css({'display': 'block'});

                $("#searchMore").css({'display': 'none'});
                $("#warning").css({'display': 'none'});
                $("#inputCity").trigger("change");
            }
        });
        $("#inputCity").on('change', function() {
            if($(this).find(':selected').data('warning') == 1){
                //Neu Chua Chon Thanh Pho
                $("#inputCity_chosen").css({'display': 'block'});
                $("#inputCityTitle").css({'display': 'block'});
                $("#registerNow").css({'display': 'none'});
                $("#description").css({'display': 'none'});
                $("#moreDescription1").css({'display': 'none'});
                $("#moreDescription2").css({'display': 'none'});
                $("#moreDescription3").css({'display': 'none'});
                $("#moreDescription4").css({'display': 'none'});

                $("#searchMore").css({'display': 'block'});
                $("#warning").css({'display': 'block'});
            } else {
                //Neu Da Chon Thanh Pho
                $("#inputCity_chosen").css({'display': 'block'});
                $("#inputCityTitle").css({'display': 'block'});
                $("#registerNow").css({'display': 'block'});
                $("#description").css({'display': 'block'});
                $("#moreDescription1").css({'display': 'block'});
                $("#moreDescription2").css({'display': 'block'});
                $("#moreDescription3").css({'display': 'block'});
                $("#moreDescription4").css({'display': 'block'});

                $("#searchMore").css({'display': 'none'});
                $("#warning").css({'display': 'none'});
            }
        });

    });



    $("#inputJob").on('change', function() {
        var that = $(this);
        var careerval = that.find(':selected').val();
        $('.loading-screen').show();
        $.ajax({
            type: "GET",
            url: that.data('loan'),
            data: {career:careerval},
            success: function(data){
                var res = data.data;
                $("#moreDescription3").addClass('disabled');
                $("#inputDoc").html("");
                if(res.length){
                    if(autoload == true){
                        $("#inputDoc").append('<option value="">Giấy tờ bạn có thể cung cấp</option>');
                    }
                    for (i = 0; i < res.length; i++) {
                        console.log(res[i].id);
                        $("#inputDoc").append('<option value="'+ res[i].id + '">' + res[i].name + '</option>');
                    }
                }
                $("#data-docsTable").html(data.table);
                btneach();
                $('.loading-screen').hide();
                if($('#inputDoc').is(':disabled') == false){
                    $("#inputDoc").trigger('chosen:updated');
                    $('.btn-choose-doc').each(function(i, obj) {
                        var that = $(this);
                        if(that.data('val') == $("#inputDoc").val()){
                            initbtneach(that);
                        }
                    });
                }
            },
            error: function(){
                alert("Server Error");
                $('.loading-screen').hide();
            }
        });
    });
    interest_rate = 15;
    function btneach(){
        $('.btn-choose-doc').each(function(i, obj) {
            var that = $(this);
            that.on('click', function() {
                autoload = false;
                initbtneach(that);
            });
        });
    }

    function initbtneach(el){
        $('#inputDoc').prop("disabled", false);
        $('#payment-term').data('min',el.data('tenure-min'));
        $('#payment-term').data('max',el.data('tenure-max'));
        $('#much-you-need').data('min',el.data('amount-min'));
        $('#much-you-need').data('max',el.data('amount-max'));
        interest_rate = el.data('rate');
        $("#moreDescription3").removeClass('disabled');
        updateRange();

        if (parseFloat($('.much-you-need-span').text().replace(/\./g, "")) > parseFloat(el.data('amount-max'))) {
            $('.much-you-need-span').text(parseFloat(el.data('amount-max')).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            money = parseFloat($('.much-you-need-span').text().replace(/\./g, ""));
        }
        // Neu month hien tai > max month
        if (parseFloat($('.payment-term-span').text().replace(/\./g, "")) > parseFloat(el.data('tenure-max'))) {
            $('.payment-term-span').text(parseFloat(el.data('tenure-max')));
            duration = parseFloat($('.payment-term-span').text().replace(/\./g, ""));
        }

        var money = parseFloat($('#much-you-need').val());
        var duration = parseFloat($('#payment-term').val());
        var result = calculatorLoan(money, interest_rate, duration, coefficient);
        $('.result-loan').html(result + '<sup>đ</sup>');
    }
    $(document).ready(function() {
        @if($partner->otp_request)
        $('input[name="input-otp"]').on('keyup',function(){
            if($(this).val() == '') {
                $('.btn-resend-otp').show();
                $('.btn-verify-otp').hide();
            } else {
                $('.btn-resend-otp').hide();
                $('.btn-verify-otp').show();
            }
        });
        $('.btn-resend-otp').on('click',function(e) {
            e.preventDefault();
            var url = $(this).data('action');
            var phone_number = $('#inputPhone').val();
            var partner_code = $('#partner-code').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: url,
                data: { phone_number: phone_number, partner_code: partner_code},
                beforeSend: function(){
                    $('.loading-screen').css('z-index','9999').show();
                },
                success: function(data){
                    $('.loading-screen').hide();
                    if(data.success == true) {
                        $('#otp-error-text').css('color','#3c763d').html('Đã gửi lại OTP, vui lòng nhập lại.')
                    } else {
                        $('#otp-error-text').css('color','red').html(data.message);
                    }
                },
                error: function(){
                    $('#otp-error-text').css('color','red').html('Có lỗi xảy ra, vui lòng thử lại sau.');
                    $('.loading-screen').hide();
                },
                complete: function() {
                }
            });
        });

        $("#inputPhone").on('keyup',function(){
            $('#parsley-id-17').show();
            $('#parsley-input-phone').hide();
        });

        $("#inputPhone").on('focusout',function(){
            $(this).parsley().validate();
            if($(this).parsley().isValid()) {
                var phone_number = $(this).val();
                var partner_code = $('#partner-code').val();
                var url = $(this).data('action');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: { phone_number: phone_number, partner_code: partner_code},
                    beforeSend: function() {
                        $('.loading-screen').show();
                    },
                    success: function(data){
                        $('.loading-screen').hide();
                        if(data.success == false) {
                            $('#inputPhone').attr('data-send-otp',0);
                            $('#phone-exists-modal').modal('show');

                            // $('#parsley-id-17').hide();
                            // $('#parsley-input-phone').show().css('color','red').html('<li>' + data.message + '</li>');
                        } else {
                            $('#inputPhone').attr('data-send-otp',1);
                        }
                    },
                    error: function(){
                        $('.loading-screen').hide();
                        $('#inputPhone').attr('data-send-otp',0);
                        $('#phone-exists-modal').modal('show');

                        // $('#parsley-id-17').hide();
                        // $('#parsley-input-phone').show().css('color','red').html('<li>Có lỗi xảy ra, vui lòng thử lại sau</li>');
                    }
                });
            }
        });
        $("#registerForm").on('submit', function(e){
            e.preventDefault();
            var form = $(this);
            var aff_sid_key = '{{ $partner->script_key ?? '_aff_sid' }}';
            var aff_sid = getCookie(aff_sid_key) || '';

            form.parsley().validate();
            if (form.parsley().isValid()) {
                if($('#inputPhone').attr('data-send-otp') == 1) {
                    var url = form.attr('action');
                    var method = form.attr('method');
                    $('.loading-screen').show();
                    $.ajax({
                        type: method,
                        url: url,
                        data: form.serialize() + '&aff_sid=' + aff_sid, // serializes the form's elements.
                        success: function (data) {
                            $('.loading-screen').hide();
                            if (data.success == true) {
                                $('#otp-error-text').html('');
                                $('#otpModal').modal('show');
                            } else {
                                $('#error-modal-title').html(data.message);
                                $('#ajaxerrorsModal').modal('show');
                            }
                        },
                        error: function () {
                            $('#error-modal-title').html('Có lỗi xảy ra, vui lòng thử lại sau');
                            $('#ajaxerrorsModal').modal('show');
                            $('.loading-screen').hide();
                        }
                    });
                } else {
                    $('#phone-exists-modal').modal('show');
                }
            }
        });

        $('#otp-form').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            var method = form.attr('method');
            var phone_number = $('#inputPhone').val();
            var otp = $('input[name="input-otp"]').val();
            var aff_sid_key = '{{ $partner->script_key ?? '_aff_sid' }}';
            var aff_sid = getCookie(aff_sid_key) || '';
            if(otp == '') {
                $('#otp-error-text').html('Vui lòng nhập mã OTP để xác nhận.');
            } else {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: method,
                    url: url,
                    data: $("#registerForm").serialize() + '&otp=' + otp + '&phone_number=' + phone_number + '&aff_sid=' + aff_sid,
                    beforeSend: function() {
                        $('.loading-screen').css('z-index','9999').show();
                    },
                    success: function(data) {
                        // console.log(data);
                        $('.loading-screen').hide();
                        if(data.url) {
                            location.href = data.url;
                        } else {
                            $('#otp-error-text').html(data.message);
                        }
                    },
                    error: function () {
                        $('.loading-screen').hide();
                        $('#otp-error-text').css('color','red').html('Có lỗi xảy ra, vui lòng thử lại sau');
                    }
                });
            }
        });
        @else
        $("#registerForm").on('submit', function(e){
            e.preventDefault();
            var form = $(this);
            var aff_sid_key = '{{ $partner->script_key ?? '_aff_sid' }}';
            var aff_sid = getCookie(aff_sid_key) || '';

            form.parsley().validate();
            if (form.parsley().isValid()){
                // ajax submit
                var url = form.attr('action');
                var method = form.attr('method');
                $('.loading-screen').show();
                $.ajax({
                    type: method,
                    url: url,
                    data: form.serialize() + '&aff_sid=' + aff_sid, // serializes the form's elements.
                    success: function(data){
                        $('.loading-screen').hide();
                        if(data.success == true){
                            location.href = data.url;
                            /* $('#successModalLoan').modal('show');
                            form.trigger("reset");
                            setTimeout(function(){
                                location.href = 'https://www.easycredit.vn/';
                            }, 6000); */
                        }else{
                            $('#error-modal-title').html(data.messages);
                            $('#ajaxerrorsModal').modal('show');
                        }
                    },
                    error: function(){
                        alert("Error");
                        $('.loading-screen').hide();
                    }
                });
            }
        });
        @endif
    });
    $(function(){
        $('.parsley-validate').parsley();
    })
</script>
<script>
    window.Parsley.addValidator("minimumage", {
        validateString: function(value, requirements) {
            // get validation requirments
            var reqs = value.split("/"),
                day = reqs[0],
                month = reqs[1],
                year = reqs[2];

            // check if date is a valid
            var birthday = new Date(year + "-" + month + "-" + day);

            // Calculate birtday and check if age is greater than 18
            var today = new Date();

            var age = today.getFullYear() - birthday.getFullYear();
            var m = today.getMonth() - birthday.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthday.getDate())) {
                age--;
            }
            return age >= requirements;
        }
    });

</script>

</body>
</html>