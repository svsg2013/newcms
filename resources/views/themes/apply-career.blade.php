@extends('frontend.layouts.master')

@section('style')

@endsection

@section('content')

    @include('themes.partials.breadcrumb')

    <section class="joinDesc">
        <div class="container">
            <h2 class="heading">Ứng tuyển vị trí<strong>{{$career->name}}</strong></h2>
            <p>Nơi làm việc: {{$career->city()->name}}</p>
            <p>Vui lòng điền đầy đủ thông tin cá nhân bên dưới và đính kèm Sơ yếu lý lịch (CV) mới nhất của bạn để ứng tuyển cho vị trí này. <br/> Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất nếu hồ sơ của bạn phù hợp với yêu cầu tuyển dụng.</p>
        </div>
    </section>

    <section class="joinCareerApply fiSolution">
        <form id="careerApply" method="post" action="{{route('frontend.post_career_apply',['page_slug'=>$page_slug,'career_slug'=>$career_slug])}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <h2 class="joinCareerApply__head">Hồ sơ ứng tuyển</h2>
            <div class="joinCareerApply__content">
                <h3 class="joinCareerApply__content__head"><i class="ic-info"></i>Thông tin cơ bản</h3>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input class="form-control" id="applyfirstname" name="last_name" type="text" required lettersonly="true" data-msg-lettersonly="Xin lỗi bạn, phần họ và tên đệm không điền số hay ký tự đặc biệt." data-msg-required="Vui lòng điền đầy đủ họ và tên đệm.">
                            <label class="label" for="applyfirstname">Họ và tên đệm</label><span class="line"></span>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input class="form-control" id="applylastname" name="first_name" type="text" required lettersonly="true" data-msg-lettersonly="Xin lỗi bạn, phần họ và tên đệm không điền số hay ký tự đặc biệt." data-msg-required="Vui lòng điền đầy đủ tên.">
                            <label class="label" for="applylastname">Tên</label><span class="line"></span>
                        </div>
                    </div>
                </div>
                <div class="row form-brithday">
                    <div class="col-12">
                        <label class="label-group">Ngày tháng năm sinh</label>
                    </div>
                    <div class="col-md-13">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select class="form-control select brithday-control" id="applydate" name="birthday_day" data-placeholder=" " required brithday="true" checkdate="true" data-msg-required="Vui lòng chọn ngày tháng năm sinh.">
                                        <option value=""> </option>
                                        @foreach(range(1,31) as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                    <label class="label" for="applydate">Ngày</label><span class="line"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select class="form-control select brithday-control" id="applymonth" name="birthday_month" data-placeholder=" ">
                                        <option value=""> </option>
                                        @foreach(range(1,12) as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                    <label class="label" for="applymonth">Tháng</label><span class="line"> </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select class="form-control select brithday-control" id="applyyear" name="birthday_year" data-placeholder=" ">
                                        <option value=""> </option>
                                        @foreach(range(date('Y')-18,1900) as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                    <label class="label" for="applyyear">Năm</label><span class="line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group text-md-right">
                            <label class="checkbox" for="applymale">
                                <input id="applymale" type="radio" name="gender" checked value="1" required data-msg-required="Vui lòng chọn giới tính của bạn."><span>Nam</span>
                            </label>
                            <label class="checkbox" for="applyfemale">
                                <input id="applyfemale" type="radio" name="gender" value="0" required data-msg-required="Vui lòng chọn giới tính của bạn."><span>Nữ</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-20">
                        <div class="form-group">
                            <input class="form-control" id="applyid" name="cccd" type="text" required number="true" data-msg-required="Vui lòng nhập số CMND/Thẻ CCCD." data-msg-number="Xin lỗi bạn, số CMND vừa điền không hợp lệ.">
                            <label class="label" for="applyid">Số CMND/Thẻ CCCD</label><span class="line"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input class="form-control" id="applyphone" name="phone" type="text" required rangelength="10,11" number="true" data-msg-rangelength="Vui lòng chỉ nhập 10 hoặc 11 ký tự số" data-msg-number="Vui lòng chỉ nhập ký tự số" data-msg-required="Vui lòng cung cấp số di động của bạn">
                            <label class="label" for="applyphone">Điện thoại di động</label><span class="line"></span><span class="info">Vui lòng điền số điện thoại di động bạn sử dụng thường xuyên để chúng tôi có thể liên lạc với bạn.</span>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input class="form-control" id="fiemail" name="email" type="email" required data-msg-required="Vui lòng cung cấp địa chỉ e-mail để chúng tôi liên hệ và xử lý hồ sơ ứng tuyển của bạn." data-msg-email="Vui lòng nhập địa chỉ thư điện tử hợp lệ">
                            <label class="label" for="fiemail">Địa chỉ e-mail</label><span class="line"></span>
                        </div>
                    </div>
                </div>
                <h3 class="joinCareerApply__content__head"><i class="ic-location"></i>Địa chỉ tạm trú</h3>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control select" id="ficity" name="city_id" required data-msg-required="Vui lòng chọn Tỉnh/Thành phố">
                                <option value="50">TP. Hồ Chí Minh</option>
                            </select>
                            <label class="label" for="ficity">Tỉnh/Thành phố</label><span class="line"></span><span class="info">Hiện tại, chúng tôi chỉ đang tuyển dụng ở khu vực TP. HCM. Các khu vực khác, chúng tôi sẽ cập nhật sau. </span>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control select" id="applydistrict" name="district_id" data-placeholder=" " required data-msg-required="Vui lòng chọn Quận/Huyện">
                                <option value=""> </option>
                                @php $district_id = 0; @endphp
                                @foreach(\App\Models\District::where('city_id',50)->get() as $index=>$item)
                                    @if(!$index)
                                        @php $district_id = $item->id; @endphp
                                    @endif
                                <option value="{{$item->id}}">{{intval($item->name) ? "Quận $item->name" : $item->name}}</option>
                                @endforeach
                            </select>
                            <label class="label" for="applydistrict">Quận/Huyện</label><span class="line"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control select" id="applyward" name="ward_id" data-placeholder=" " required data-msg-required="Vui lòng chọn Phường/Xã">
                                <option value=""> </option>
                                @foreach(\App\Models\Ward::where('district_id',$district_id)->get() as $index=>$item)
                                    <option value="{{$item->id}}">{{intval($item->name) ? "Phường/Xã $item->name" : $item->name}}</option>
                                @endforeach
                            </select>
                            <label class="label" for="applyward">Phường/Xã</label><span class="line"></span>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input class="form-control" id="applyaddress" name="address" type="text" required data-msg-lettersonly="Xin lỗi bạn, phần địa chỉ chi tiết không được điền ký tự đặc biệt. " data-msg-required="Vui lòng điền địa chỉ chi tiết.">
                            <label class="label" for="applyaddress">Số nhà, Tên đường/Phố</label><span class="line"></span>
                        </div>
                    </div>
                </div>
                <h3 class="joinCareerApply__content__head"><i class="ic-location"></i>Thông Tin Ứng Tuyển</h3>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control select" id="applycity2" name="applycity2" required data-msg-required="Vui lòng chọn Tỉnh/Thành phố">
                                <option value="50" selected>TP. Hồ Chí Minh</option>
                            </select>
                            <label class="label" for="applycity2">Tỉnh/Thành phố</label><span class="line"></span><span class="info">Vui lòng chọn tên Tỉnh/Thành phố nơi bạn sẽ làm việc. (Hiện tại chỉ hiển thị TP.HCM)</span>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control select" id="applyinfo" name="reference" data-placeholder=" " required data-msg-required="Vui lòng điền nơi bạn biết đến thông tin tuyển dụng.">
                                <option value=""></option>
                                <!-- <option value="24h.com.vn">24h.com.vn</option>
                                <option value="Careerbuilder.vn">Careerbuilder.vn</option>
                                <option value="Careerlink.vn">Careerlink.vn</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Các diễn đàn online">Các diễn đàn online</option>
                                <option value="Ngày hội việc làm">Ngày hội việc làm</option>
                                <option value="LinkedIn">LinkedIn</option>
                                <option value="mywork.vn">mywork.vn</option>
                                <option value="Easycredit.vn">Easycredit.vn</option>
                                <option value="Timviecnhanh.com">Timviecnhanh.com</option>
                                <option value="Vietnamworks.vn">Vietnamworks.vn</option>
                                <option value="Indeed.com">Indeed.com</option>
                                <option value="Bạn bè tại EASY CREDIT giới thiệu">Bạn bè tại EASY CREDIT giới thiệu</option>
                                <option value="Các website tìm việc khác">Các website tìm việc khác</option> -->
                                @if(!empty(\App\Models\Website::where('active', 1)->get()))
                                @foreach(\App\Models\Website::where('active', 1)->get() as $key => $value)
                                <option value="{{ $value->name }}">{{ $value->name }}</option>
                                @endforeach
                                @endif
                            </select>
                            <label class="label" for="applyinfo">Bạn biết thông tin tuyển dụng từ đâu?</label><span class="line"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-20">
                        <label class="label-group">Đính kèm hồ sơ ứng tuyển <i>(Định dạng *.doc, *.docx, *.pdf và file không được vượt quá 1mb.)</i></label>
                        <div class="form-group">
                            <div class="input-group file-group align-items-center">
                                <div class="form-control">
                                    <label for="applydoc">Chọn tệp</label>
                                    <input id="applydoc" type="file" name="attach_file" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf">
                                </div>
                                <div class="input-group-append">
                                    <label class="btn btn-outline-secondary" for="applydoc">Tải lên</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-20">
                        <label class="label-group">Đính kèm hình <i>(Định dạng *.png, *.jpg, *.jpeg và file không được vượt quá 1mb.)</i></label>
                        <div class="form-group">
                            <div class="input-group file-group align-items-center">
                                <div class="form-control">
                                    <label for="applyimg">Chọn tệp</label>
                                    <input id="applyimg" type="file" name="image" accept="image/png, image/jpeg, image/jpg">
                                </div>
                                <div class="input-group-append">
                                    <label class="btn btn-outline-secondary" for="applyimg">Tải lên</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input class="form-control" id="applyjob" name="latest_work" type="text">
                            <label class="label" for="applyjob">Công ty làm việc gần nhất</label><span class="line"></span>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input class="form-control" id="applyposition" name="latest_position" type="text">
                            <label class="label" for="applyposition">Chức danh công việc gần nhất</label><span class="line"></span>
                        </div>
                    </div>
                </div>
                <div class="joinCareerApply__content__footer text-lg-right"><a class="btn btn-additional btn-sm" href=""> <span> <span data-text="Trở lại">Trở lại</span></span></a>
                    <button class="btn btn-danger btn-sm btn-shadow" type="submit">Ứng tuyển</button>
                </div>
            </div>
        </form>
    </section>


    @include('themes.partials.register_career')
@endsection

@push('add_script')
    <script>
        $('#applydistrict').change(function () {
            let district_id = $(this).val();
            $.get('{{route('frontend.get_ward')}}?district_id='+district_id,function (res) {
                let html = res.map(function (item) {
                    return `<option value="${item.id}">${item.name}</option>`;
                }).join('');
                $("#applyward").html(html);
                $("#applyward").trigger("chosen:updated");
            });
        });
        $('button[type="submit"]').click(()=>{$('form#careerApply').submit()});
    </script>
@endpush