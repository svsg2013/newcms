@extends('frontend.layouts.master')

@section('style')
@endsection

@section('content')
    @include('themes.partials.breadcrumb')

    <section class="joinCulture">
        <div class="container">
            @if($blocks->has('FAQ') && $bt = $blocks->get('FAQ')->first())
            <div class="joinCultureContact">
                <div class="joinCultureContact__intro">
                    <h2 class="heading">{!! $bt->name !!}</h2>
                    {!! $bt->content !!}
                </div>
                <div class="joinCultureContact__accordion">
                    <ul class="quick--link">
                        @foreach($faq_category as $index=>$item)
                        <li class="{{!$index ? 'active' : ''}}"><a href="#category{{$index}}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                    <div class="joinCultureContact__accordion__content">
                        @foreach($faq_category as $index=>$item)
                        <div class="panel-group {{!$index ? 'active' : 'flyright'}}" id="category{{$index}}" role="tabpanel" aria-multiselectable="true">
                            @foreach($item->faqs as $key=>$value)
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingfaq{{$index.'-'.$key}}">
                                    <h4 class="panel-title">
                                        <a class="{{!$key ? '' : 'collapsed'}}" data-toggle="collapse" data-parent="#category{{$index}}" href="#collapsefaq{{$index.'-'.$key}}" aria-expanded="true" aria-controls="collapseOne">
                                            <span class="icon-tab"></span>
                                            {{($key+1)}}. {{$value->question}}
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse {{!$key ? 'show' : 'in'}}" id="collapsefaq{{$index.'-'.$key}}" role="tabpanel" aria-labelledby="headingfaq{{$index.'-'.$key}}" data-parent="#category{{$index}}">
                                    <div class="panel-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p>{!! $value->answer !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            <div class="joinCultureContact__form">
                <div class="joinCultureContact__formInner">
                    <div class="row">
                        <div class="col-lg-13">
                            <form class="validate" id="form1" action="{{route('page.storeContact')}}" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="subject" placeholder="Tiêu đề" required data-msg-required="Vui lòng điền tiêu đề">
                                    </div>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="name" placeholder="Họ và tên" required data-msg-required="Vui lòng họ tên">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="phone" placeholder="Điện thoại" required rangelength="10,11" number="true" data-msg-rangelength="Vui lòng chỉ nhập 10 hoặc 11 ký tự số" data-msg-number="Vui lòng chỉ nhập ký tự số" data-msg-required="Vui lòng cung cấp số di động của bạn">
                                    </div>
                                    <div class="col-md-10">
                                        <input class="form-control" type="email" name="email" placeholder="Email" required data-msg-required="Vui lòng cung cấp địa chỉ thư điện tử " data-msg-email="Vui lòng nhập địa chỉ thư điện tử hợp lệ">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-20">
                                        <textarea title="Nội dung tin nhắn" placeholder="Nội dung tin nhắn" class="form-control" required name="content" data-msg-required="Vui lòng nhập nội dung liên hệ"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-20 text-center">
                                        <button class="btn btn-sm btn-primary" type="submit">Gửi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact--info">
                                <h4>Liên hệ với chúng tôi</h4>
                                <table>
                                    <tr>
                                        <td><img src="assets/images/ic-phone.svg" alt=""></td>
                                        <td>{{System::content('phone_faq','(028) 2222-9999')}}</td>
                                    </tr>
                                    <tr>
                                        <td><img src="assets/images/ic-mail.svg" alt=""></td>
                                        <td><a href="mailto:{{System::content('email','info@easycredit.vn')}}">{{System::content('email','info@easycredit.vn')}}</a></td>
                                    </tr>
                                    <tr>
                                        <td><img src="assets/images/ic-pin.svg" alt=""></td>
                                        <td>{{System::content('address','Tầng 5, 610 Võ Văn Kiệt, Cau Kho ward, District 1, Ho Chi Minh City')}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="joinCultureContact__map">
        <div class="map_canvas--wrapper">
            <button class="btn btn-reload"> <i class="icon_refresh"></i></button>
            <div class="map_canvas" id="map_canvas" style="height: 420px"></div>
        </div>
        <div class="group-link text-center"><a class="btn btn-danger btn-lg" href="{{ !empty(\App\Models\PageBlock::where('code', 'JOIN-US-FAQ-URL')->first()) ? \App\Models\PageBlock::where('code', 'JOIN-US-FAQ-URL')->first()->url : '' }}">BẠN TÌM KIẾM CÔNG VIỆC TRONG MƠ?</a></div>
    </section>


    @include('themes.partials.register_career')
@endsection

@push('add_script')
    <script src="https://maps.google.com/maps/api/js?key={{ config('services.google.map_key') }}"></script>

    <script>
        var locations = [
            ['', 10.756620, 106.689510, '{{ System::content("address","610 Võ Văn Kiệt, P. Cầu Kho, Quận 1, TP. Hồ Chí Minh") }}', '{{ System::content("phone","1900 1066") }}', '']
        ];

        function initialize() {

            var map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 15,
                center: new google.maps.LatLng(10.756620, 106.689510),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var companyImage = new google.maps.MarkerImage('assets/images/ic-marker.png',
                new google.maps.Size(37,40),
                new google.maps.Point(0,0)
            );

            var infowindow = new google.maps.InfoWindow({
                maxWidth: 224
            });

            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    icon: companyImage,
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        var infoHTML =  '<div class="infowindow">' +
                            '<h3 class="infowindow__head">'+locations[i][0]+'</h3>' +
                            '<p>Địa chỉ: '+locations[i][3]+'</p>' +
                            '<p>Điện thoại: '+locations[i][4]+'</p>' +
                            '<p>Fax: '+locations[i][5]+'</p>' +
                            '</div>';
                        infowindow.setContent(infoHTML);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }

            // *
            // START INFOWINDOW CUSTOMIZE.
            // *
            google.maps.event.addListener(infowindow, 'domready', function() {
                var iwOuter = $('.gm-style-iw');
                var iwBackground = iwOuter.prev();
                iwBackground.children(':nth-child(2)').css({'display' : 'none'});
                iwBackground.children(':nth-child(4)').css({'display' : 'none'});
                iwOuter.parent().parent().css({left: '80px'});
                iwBackground.children(':nth-child(1)').css({'display' : 'none'}).attr('style', function(i,s){ return s + 'left: 76px !important;'});
                iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});
                iwBackground.children(':nth-child(3)').find('div').children().css({'display' : 'none','box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});
                var iwCloseBtn = iwOuter.next();
                iwCloseBtn.css({opacity: '1', right: '15px', top: '-3px',});
                if($('.iw-content').height() < 140){
                    $('.iw-bottom-gradient').css({display: 'none'});
                }
                iwCloseBtn.mouseout(function(){
                    $(this).css({opacity: '1'});
                });
            });
        }

        $(function () {
            initialize();

            $('.btn-reload').click(function(){
                initialize();
            })
        });
    </script>
@endpush