@extends('frontend.layouts.master')

@section('content')

<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! $blocks['SOLUTION-CASH-LOAN-BANNER'][0]->photo !!}')"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <!-- <h1>Vay tiêu dùng tín chấp</h1> -->
        <h1>{!! $blocks['SOLUTION-CASH-LOAN-BANNER'][0]->name !!}</h1>

        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>

<section class="theLoanDesc theLoanDesc--2">
    <div class="container">
        <div class="theLoanDesc__inner text-left">
            <h2 class="heading">{!! $blocks['SOLUTION-CASH-LOAN-GENERAL'][0]->name !!}</h2>
            {!! $blocks['SOLUTION-CASH-LOAN-GENERAL'][0]->content !!}
        </div>
    </div>
</section>

<section class="cashWhy">
    @if(!empty($blocks['SOLUTION-CASH-LOAN-GENERAL'][0]->children))
    @foreach($blocks['SOLUTION-CASH-LOAN-GENERAL'][0]->children as $key => $block)
    <div class="theLoanItem theLoanItem--2" data-waypoint="{{ $key == 0 ? '85%' : '70%' }}">
        <div class="container">
        <div class="theLoanItem__img">
            <div class="theLoanItem__img__inner" style="background-image:url('{!! $block->photo !!}')"><img src="{!! $block->photo !!}" alt="online service"></div>
        </div>
        <div class="theLoanItem__content"><img class="theLoanItem__icon" src="{!! $block->icon !!}" alt="">
            <h3 class="theLoanItem__title">{!! $block->name !!}</h3>
            <div class="theLoanItem__desc">
                {!! $block->content !!}
            </div>
            <div class="theLoanItem__line"></div>
        </div>
        </div>
    </div>
    @endforeach
    @endif
</section>

<section class="contractTerm" data-waypoint="70%">
    <div class="container">
        <div class="row">
            @if(!empty($blocks['SOLUTION-CASH-LOAN-RULES'][0]->children))
            @foreach($blocks['SOLUTION-CASH-LOAN-RULES'][0]->children as $key => $block)
            <div class="col-md-10">
                <div class="contractTerm__item" data-waypoint="70%">
                    <h2 class="heading">{!! $block->name !!}</h2>
                    <div class="contractTerm__desc">{!! $block->content !!}</div>
                    <div class="contractTerm__btn"><a class="btn btn-additional btn-lg" href="{!! $block->url !!}" title="Xem chi tiết"> <span> <span data-text="Xem chi tiết">Xem chi tiết</span></span></a></div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>

<section class="calculateLoan">
    <div class="container">
        <div class="fiSolution" data-waypoint="70%">
            <h2 class="heading">Tính toán
                <strong>Khoản vay</strong>
            </h2>
            <form class="validate" id="fiSolution">
                <input type="hidden" name="_token" value="c">
                <div class="fiSolution__row">
                    <div class="row">
                        <div class="col-sm-10">
                            <h3>Bước 1: Cung cấp giấy tờ</h3>
                            <div class="form-group">
                                <select class="form-control select" id="fijob" name="fijob" data-placeholder=" " required data-msg-required="Vui lòng chọn công việc hiện tại của bạn">
                                    <option value=""></option>
                                    @if(!empty($loan_job))
                                    @foreach($loan_job as $key)
                                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <label class="label" for="ficity">Công việc hiện tại của bạn</label>
                                <span class="line"></span>
                            </div>
                            <div class="form-group">
                                <select class="form-control select docs-modal" id="fidoc" name="fidoc" data-placeholder=" " required data-msg-required="Vui lòng chọn loại giấy tờ có thể cung cấp">
                                    <option value=""></option>
                                    @if(!empty($combo))
                                    @foreach($combo as $key)
                                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <label class="label" for="ficity">Giấy tờ bạn có thể cung cấp</label>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="col-sm-10 disabled">
                            <h3>Bước 2: Tính toán khoản vay</h3>
                            <div class="form-range">
                                <label for="much-you-need">Khoản vay bạn cần</label>
                                <ins>
                                    <span class="much-you-need-span">50.000.000</span>
                                    <sup>đ</sup>
                                </ins>
                                <input class="form-control" id="much-you-need" name="much-you-need" type="number" data-min="10000000" data-max="90000000"
                                    data-from="50000000" data-step="1000000" data-prefix="đ">
                            </div>
                            <div class="form-range">
                                <label for="payment-term">Thời hạn vay</label>
                                <ins>
                                    <span class="payment-term-span">20</span>
                                    <sup>tháng</sup>
                                </ins>
                                <input class="form-control" id="payment-term" name="payment-term" type="number" data-min="6" data-max="60" data-from="20"
                                    data-step="1" data-prefix="t">
                            </div>
                        </div>

                        <input class="form-control" id="partner-code" name="partner-code" type="hidden" value="">
                        <input class="form-control" id="template-id" name="template-id" type="hidden" value="">
                    </div>
                </div>
                <div class="fiSolution__divider">
                    <span>Khoản trả hàng tháng </span>
                    <b class="result-loan">5.000.000
                        <sup>đ</sup>
                    </b>
                </div>
                <div class="fiSolution__row">
                    <div class="row">
                        <div class="col-sm-10">
                            <h3>Bước 3: Đăng ký vay</h3>
                        </div>
                        <div class="col-sm-10"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input class="form-control data-hj-whitelist" id="finame" name="finame" type="text" required lettersonly="true" data-msg-required="Vui lòng điền đầy đủ họ và tên." data-hj-whitelist>
                                <label class="label" for="finame">Họ và tên (Có dấu)</label>
                                <span class="line"></span>
                            </div>
                            <div class="form-group">
                                <input class="form-control data-hj-whitelist" id="fiemail" name="fiemail" type="email" data-msg-email="Vui lòng nhập địa chỉ e-mail hợp lệ" data-hj-whitelist>
                                <label class="label" for="fiemail">E-mail</label>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input class="form-control data-hj-whitelist" id="fiphone" name="fiphone" type="text" required rangelength="10,10" number="true" data-msg-rangelength="Vui lòng nhập 10 ký tự số"
                                    data-msg-number="Vui lòng chỉ nhập ký tự số" data-msg-required="Vui lòng cung cấp số di động của bạn" data-hj-whitelist>
                                <label class="label" for="fiphone">Số điện thoại đang sử dụng</label>
                                <span class="line"></span>
                            </div>
                            <div class="form-group">
                                <select class="form-control select" id="ficity" name="ficity" data-placeholder=" " required data-msg-required="Vui lòng chọn nơi bạn đang sinh sống">
                                    <option value=""></option>
                                    @if(!empty($city))
                                    @foreach($city as $key)
                                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <label class="label" for="ficity">Tỉnh/Thành phố</label>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fiSolution__row fiSolution__row--submit">
                    <div class="fiSolution__row__inner">
                        <button class="btn btn-danger btn-shadow btn-submit-popup-loan 
                            @if($composer_active_popup == true) 
                                btn-loan-stop 
                            @else 
                                btn-loan 
                            @endif" type="submit">Hẹn gọi lại ngay</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="toCustomers" style="background-image: url('{!! !empty($blocks['SOLUTION-CASH-LOAN-COMMITMENT'][0]) ? $blocks['SOLUTION-CASH-LOAN-COMMITMENT'][0]->photo : '' !!}')" data-waypoint="70%" data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container">
        <h2 class="heading text-left">{!! !empty($blocks['SOLUTION-CASH-LOAN-COMMITMENT'][0]) ? $blocks['SOLUTION-CASH-LOAN-COMMITMENT'][0]->name : '' !!}</h2>
        <div class="toCustomers__content">
            <h3 class="toCustomers__heading">{!! !empty($blocks['SOLUTION-CASH-LOAN-COMMITMENT-DETAIL'][0]) ? $blocks['SOLUTION-CASH-LOAN-COMMITMENT-DETAIL'][0]->name : '' !!}</h3>
            <div class="toCustomers__desc">
                {!! !empty($blocks['SOLUTION-CASH-LOAN-COMMITMENT-DETAIL'][0]) ? $blocks['SOLUTION-CASH-LOAN-COMMITMENT-DETAIL'][0]->content : '' !!}
            </div>
        </div>
    </div>
</section>

@if(!empty($blocks['SOLUTION-CASH-LOAN-FOOTER'][0]))
<section class="getStarted" style="background-image: url('{!! $blocks['SOLUTION-CASH-LOAN-FOOTER'][0]->photo !!}')" data-waypoint="70%"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container">
        <h2 class="heading heading--white">{!! $blocks['SOLUTION-CASH-LOAN-FOOTER'][0]->name !!}</h2>
        <div class="text-center">
            <a class="btn btn-danger btn-shadow" href="{!! $blocks['SOLUTION-CASH-LOAN-FOOTER'][0]->url !!}">tìm hiểu ngay</a>
        </div>
    </div>
</section>
@endif

@endsection