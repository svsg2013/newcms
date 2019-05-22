<div class="modal fade modalDefalt" id="docsModal" tabindex="-1" role="dialog" aria-labelledby="careerDetail"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-header">
                <h5 class="modal-title">HÃY CHỌN BỘ GIẤY TỜ BẠN CÓ THỂ CUNG CẤP</h5>
            </div>
            <div class="modal-body">
                <div class="docsTable">
                    <table>
                        <thead>
                            <tr>
                                <th>Giấy tờ hợp lệ</th>
                                @if(!empty($combo))
                                @foreach($combo as $key)
                                <th>{{ $key->name }}</th>
                                @endforeach
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($loan_document) && !empty($combo))
                            @foreach($loan_document as $key1)
                            <tr>
                                <th>{{ $key1->name }}</th>
                                @foreach($combo as $key2)
                                <td>
                                    @php
                                    $array_document = $key2->documents->pluck('id')->toArray();
                                    @endphp

                                    @if(in_array($key1->id, $array_document))
                                    <img src="/assets/images/logo-small.svg" alt="">
                                    @endif
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                            @endif

                            <tr class="button">
                                <th></th>
                                @if(!empty($combo))
                                @foreach($combo as $key)
                                <td>
                                    <div class="btn-wrap">
                                        <button class="btn btn-primary btn-sm btn-shadow choose_doc" data-val="{{ $key->id }}">Chọn</button>
                                    </div>
                                </td>
                                @endforeach
                                @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modalDefalt infoModal" id="warningFirstModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <h5 class="modal-title">Hãy chọn công việc hiện tại<br /> trước khi chọn giấy tờ bạn có thể
                    cung cấp.</h5>
                <a class="btn btn-danger btn-sm btn-shadow" href="javascript:void(0)" data-dismiss="modal">Tiếp tục</a>
            </div>
            <div class="modal-footer">
                <p></p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modalDefalt infoModal" id="warningModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <h5 class="modal-title">Hãy chọn công việc hiện tại<br /> và giấy tờ bạn có thể cung cấp<br />
                    trước khi tính toán khoản vay</h5>
                <a class="btn btn-danger btn-sm btn-shadow" href="javascript:void(0)" data-dismiss="modal">Tiếp tục</a>
            </div>
            <div class="modal-footer">
                <p></p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modalDefalt" id="warningChooseModal" tabindex="-1" role="dialog" aria-labelledby="Chọn công việc và giấy tờ"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <div class="text-center">
                    <h5 class="modal-title mb-4">Lựa chọn của bạn không được hỗ trợ vay<br /> Vui lòng chọn các trường
                        khác</h5>
                    <button class="btn btn-danger btn-shadow" data-dismiss="modal">Tiếp tục</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modalDefalt infoModal" id="errorsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <h5 class="modal-title">Bạn vui lòng bổ sung thông tin cá nhân <br /> để hoàn tất đăng ký khoản vay.</h5>
                <!-- <div class="error-sign-up"></div> -->
                <a class="btn btn-danger btn-sm btn-shadow" href="javascript:void(0)" data-dismiss="modal">Tiếp tục</a>
            </div>
            <div class="modal-footer">
                <p></p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modalDefalt infoModal" id="telephoneDulicete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <h5 class="modal-title">Lưu ý: Số điện thoại đăng ký <br />đã tồn tại trên hệ thống. <br />Bạn vui lòng
                    liên hệ tổng đài để được hỗ trợ</h5><a class="btn btn-danger btn-sm btn-shadow" href="tel:+84{{System::content('phone','19001066')}}">
                    <i><img class="svg" src="/assets/images/icons/ic-call.svg" alt=""></i>Gọi ngay {{System::content('phone','19001066')}}</a>
            </div>
            <div class="modal-footer">
                <p>Quay về trang chủ sau <span class="countdown-reload">6</span> giây</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modalDefalt infoModal" id="successModalLoan" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <h5 class="modal-title">Chúng tôi đã nhận được thông tin <br />đăng ký vay và sẽ liên hệ bạn <br />trong
                    thời gian sớm nhất.</h5>
                <p><strong>Bạn cần hỗ trợ gấp? </strong></p><a class="btn btn-danger btn-sm btn-shadow" href="tel:+84{{System::content('phone','19001066')}}">
                    <i><img class="svg" src="/assets/images/icons/ic-call.svg" alt=""></i>Gọi ngay
                    {{System::content('phone','19001066')}}</a>
            </div>
            <div class="modal-footer">
                <p>Quay về trang chủ sau <span class="countdown-reload">6</span> giây</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modalDefalt infoModal" id="modalLoanStop" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <h5 class="modal-title">{!! $composer_content_popup !!}</h5>
                <p><strong>Bạn cần hỗ trợ gấp? </strong></p><a class="btn btn-danger btn-sm btn-shadow" href="tel:+84{{System::content('phone','19001066')}}">
                    <i><img class="svg" src="/assets/images/icons/ic-call.svg" alt=""></i>Gọi ngay
                    {{System::content('phone','19001066')}}</a>
            </div>
            <div class="modal-footer">
                <p>Quay về trang chủ sau <span class="countdown-reload">6</span> giây</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modalDefalt infoModal" id="successSubscribeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <h5 class="modal-title">Đã đăng ký thành công.</h5>
                <a class="btn btn-danger btn-sm btn-shadow" href="javascript:void(0)" data-dismiss="modal">Tiếp tục</a>
            </div>
            <div class="modal-footer">
                <p></p>
            </div>
        </div>
    </div>
</div>