<section class="cta" style="background-image: url(assets/images/cta-bg.jpg)">
    <div class="container">
        <div class="cta__inner">
            <h2>ĐĂNG KÝ NHẬN TIN TỨC VÀ CƠ HỘI NGHỀ NGHIỆP TỪ EASY CREDIT</h2>
            <form class="validate row" id="cta" method="post">
                {{ csrf_field() }}
                <div class="col-md-14 col-lg-15">
                    <div class="form-group">
                        <input class="form-control" id="ctaSubcribe" type="email" name="email" placeholder="Vui lòng nhập địa chỉ e-mail của bạn" required data-msg-required="Vui lòng nhập địa chỉ e-mail của bạn" data-msg-email="Vui lòng nhập địa chỉ e-mail hợp lệ">
                        <input type="hidden" name="type" value="CANDIDATE"> 
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 text-center mt-1 mt-md-0">
                    <button class="btn btn-default btn-block btn-subcribe-news" type="submit">Đăng ký</button>
                </div>
            </form>
            <div class="cta__follow">
                <h3>KẾT NỐI TUYỂN DỤNG EASY CREDIT</h3>
                <ul>
                    <li><a target="_blank" class="facebook" href="https://www.facebook.com/Easycreditcareers/"></a></li>
                    <li><a target="_blank" class="linkedin" href="{{System::content('likedin','')}}"></a></li>
                    <li><a target="_blank" class="youtube" href="{{System::content('youtube','')}}"></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>