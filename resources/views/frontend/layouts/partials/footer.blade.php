<footer class="footer">
    <div class="footer__top">
        <div class="container">
            <a class="toTop" href="#"></a>
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <img class="footer__img" src="assets/images/logo.svg" alt="">
                    <ul class="footer__contact">
                        <li>
                            <i>A</i>{{System::content('address','Tầng 5, 610 Võ Văn Kiệt, Cau Kho ward, District 1, Ho Chi Minh City')}}</li>
                        <li>
                            <i>T</i>
                            <a href="tel:{{System::content('phone','(038) 2222-9999')}}">{{System::content('phone','(038) 2222-9999')}}</a> hoặc
                            <a href="tel:{{System::content('phone_bottom','(038) 2222-9999')}}">{{System::content('phone_bottom','(038) 2222-9999')}}</a>
                        </li>
                        <li>
                            <i>E</i>
                            <a href="mailto:{{System::content('email','info@easycredit.vn')}}">{{System::content('email','info@easycredit.vn')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-15 offset-1 col-lg-14 offset-lg-2 footer__newsletter">
                    <h3>KẾT NỐI VỚI CHÚNG TÔI.</h3>
                    <p>Để luôn được cập nhật ưu đãi mới nhất từ EASY CREDIT</p>
                    <div class="error-subscribe"></div>
                    <form class="validate" action="{{route('url.subscribe')}}" id="newsletter" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-14">
                                <div class="form-group">
                                    <input class="form-control" id="subcribe" type="email" name="email" placeholder="Địa chỉ email của bạn" required data-msg-required="Vui lòng cung cấp địa chỉ e-mail của bạn."
                                        data-msg-email="Vui lòng nhập địa chỉ e-mail hợp lệ">
                                    <input type="hidden" name="type" value="CUSTOMER"> 
                                </div>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-danger btn-shadow btn-block btn-subscribe" type="submit">Đăng ký</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-lg-4">
                    <div class="footer__menu">
                        <h3>Kết nối với EASY CREDIT</h3>
                        <ul class="footer__social">
                            <li>
                                {{--  <a class="facebook" href="{{ System::content('facebook','') }}"></a>  --}}
                                <a class="facebook" href="{{ System::content('facebook','') }}" aria-label="Facebook" target="blank"></a>
                            </li>
                            <li>
                                {{--  <a class="zalo" href="{{ System::content('zalo','') }}"></a>  --}}
                                <a class="linkedin" href="{{ System::content('likedin','') }}" aria-label="Linkedin" target="blank"></a>
                            </li>
                            <li>
                                {{--  <a class="youtube" href="{{ System::content('youtube','') }}"></a>  --}}
                                <a class="youtube" href="{{ System::content('youtube','') }}" aria-label="Youtube" target="blank"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                {!! getFooterHtml() !!}
            </div>
        </div>
        <div class="footer__line">
            <div class="container">
                <div class="row">
                    <div class="col-19 col-md-13"></div>
                    <div class="col-1 col-md-7"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__copyright text-center">
        <div class="container">
            <p class="footer__copyright__desc">EASY CREDIT là Khối Tín dụng Tiêu dùng của Công Ty Tài chính Cổ phần Điện lực.</p>
            <p>2018 - © Bản quyền thuộc về EASY CREDIT</p>
        </div>
    </div>
</footer>
<!-- End Footer-->