@extends('frontend.layouts.master') @section('content')
<style>
    .docsTable table tbody tr.button .btn.btn-primary.btn-shadow.btn-shadowjs.active {
        pointer-events: auto!important;
        cursor: pointer!important;
    }
    .chosen-results {
        z-index: 1000000000000;
    }

</style>
<section class="banner">
    <div class="banner__content">
        @if(isset($blocks['HOME-SLIDER'][0]) && isset($blocks['HOME-SLIDER'][0]->children))
        @foreach($blocks['HOME-SLIDER'][0]->children as $key => $block)
        <a class="banner__content__item" style="background-image: url('{{ $block->photo }}')" href="{{ $block->url }}">
            <img src="{{ $block->photo }}" alt="">
        </a>
        @endforeach
        @endif
    </div>
    <div class="banner__form">
        <div class="container">
            <div class="row">
                <div class="col-md-16 offset-md-4 col-lg-13 offset-lg-7 col-xl-10 offset-xl-10">
                    <div class="fiSolution">
                        <h2 class="fiSolution__head">GIẢI PHÁP TÀI CHÍNH TRONG VÒNG 24H</h2>
                        <form class="validate" id="fiSolution">
                            {{ csrf_field() }}
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
                                                <span class="much-you-need-span">50.000.000</span><sup>đ</sup>
                                            </ins>
                                            <input class="form-control" id="much-you-need" name="much-you-need" type="number" data-min="10000000" data-max="90000000"
                                                data-from="50000000" data-step="1000000" data-prefix="đ">
                                        </div>
                                        <div class="form-range">
                                            <label for="payment-term">Thời hạn vay</label>
                                            <ins>
                                                <span class="payment-term-span">20</span><sup>tháng</sup>
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
                                <b class="result-loan">5.000.000<sup>đ</sup></b>
                            </div>
                            <div class="fiSolution__row">
                                <h3>Bước 3: Đăng ký vay</h3>
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
                                        @endif" type="submit">
                                        <i><img class="svg" src="/assets/images/icons/ic-call.svg" alt=""></i>Hẹn gọi lại ngay
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="scrollBottom" href="#whyChoose"></a>
</section>

<section class="whyChoose" id="whyChoose" data-waypoint="70%">
    {{--
    <h2 class="heading">Tại sao chọn
        <strong>easy credit?</strong>
    </h2> --}}
    <h2 class="heading">{!! $blocks['HOME-WHY-CHOOSE'][0]->description !!}</h2>

    <div class="container">
        <div class="row">
            @if(!empty($blocks['HOME-WHY-CHOOSE'][0]->children))
            @foreach($blocks['HOME-WHY-CHOOSE'][0]->children as $key => $block)
            <div class="col-md-6 offset-md-{{ $key == 0 ? '0' : '1' }} col-lg-5 offset-lg-1 col-xl-4 offset-xl-2">
                <div class="whyChoose__item">
                    <div class="whyChoose__item__icon">
                        <img src="{{ $block->icon }}" alt="">
                    </div>
                    <h3 class="whyChoose__item__title">{!! $block->name !!}</h3>
                    <p class="whyChoose__item__desc">{!! $block->description !!}</p>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>

<section class="financialSolution" style="background-image: url('{{ $blocks['HOME-FINANCIAL-SOLUTIONOF-EASY-CREDIT'][0]->photo }}')"
    data-waypoint="70%" data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-9 col-xl-7">
                {{--
                <h2 class="heading heading--small">financial solution
                    <strong>of easy credit</strong>
                </h2> --}}
                <h2 class="heading heading--small">{!! $blocks['HOME-FINANCIAL-SOLUTIONOF-EASY-CREDIT'][0]->name !!}</h2>
                <h3>{!! $blocks['HOME-FINANCIAL-SOLUTIONOF-EASY-CREDIT'][0]->description !!}</h3>
                <p>{!! $blocks['HOME-FINANCIAL-SOLUTIONOF-EASY-CREDIT'][0]->content !!}</p>
            </div>
        </div>
    </div>
</section>

<section class="loanYct" data-waypoint="70%">
    <div class="loanYct__img" style="background-image: url('{!! $blocks['HOME-LOANS-YOU-CAN-TRUST'][0]->photo !!}')">
        <img src="{!! $blocks['HOME-LOANS-YOU-CAN-TRUST'][0]->photo !!}" alt="Loans You Can Trust">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 offset-md-11">
                <div class="loanYct__content">
                    {{--
                    <h2 class="heading heading--small">ĐỐI TÁC TÀI CHÍNH
                        <strong>ĐÁNG TIN CẬY </strong>
                    </h2> --}}
                    <h2 class="heading heading--small">{!! $blocks['HOME-LOANS-YOU-CAN-TRUST'][0]->name !!}</h2>
                    <h3>{!! $blocks['HOME-LOANS-YOU-CAN-TRUST'][0]->description !!}</h3>
                    <p>
                        <a class="btn btn-danger btn-shadow @if($composer_active_popup == true) btn-loan-stop @endif" href="@if($composer_active_popup == false) {!! $blocks['HOME-LOANS-YOU-CAN-TRUST'][0]->url !!} @endif" title="Đăng ký ngay">Đăng ký ngay</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@if(!empty($blocks['HOME-STEP-TO-GET-FAST-LOAN'][0]))
<section class="stepsGetLoan">
    <h2 class="heading">{!! $blocks['HOME-STEP-TO-GET-FAST-LOAN'][0]->description !!}</h2>

    <div class="container">
        <div class="steps">
            @if(!empty($blocks['HOME-STEP-TO-GET-FAST-LOAN'][0]->children))
            @foreach($blocks['HOME-STEP-TO-GET-FAST-LOAN'][0]->children as $key => $block)
            <div class="steps__item" data-waypoint="70%">
                <div class="steps__item__num">
                    <span>{{ $key + 1 }}</span>
                </div>
                <div class="steps__item__content">
                    <div class="steps__item__img">
                        <img src="{{ $block->icon }}" alt="{{ $block->name }}">
                    </div>
                    <h3 class="steps__item__title">{!! $block->name !!}</h3>
                    <p class="steps__item__desc">
                    {!! $block->description !!}
                    </p>

                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['HOME-OUR-PROMISE-TO-YOU'][0]))
<section class="ourPromise" style="background-image: url('{!! $blocks['HOME-OUR-PROMISE-TO-YOU'][0]->photo !!}');" data-waypoint="70%"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-9 col-xl-9">
                <h2 class="heading heading--small">{!! $blocks['HOME-OUR-PROMISE-TO-YOU'][0]->name !!}</h2>

                <h3>{!! $blocks['HOME-OUR-PROMISE-TO-YOU'][0]->description !!}</h3>
                <p>{!! $blocks['HOME-OUR-PROMISE-TO-YOU'][0]->content !!}</p>
                <p>
                    <a class="btn btn-danger btn-shadow" href="{!! $blocks['HOME-OUR-PROMISE-TO-YOU'][0]->url !!}" title="Đăng ký ngay">Đăng ký ngay</a>
                </p>
            </div>
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['HOME-WHAT-OUR-CUSTOMERS-SAY'][0]))
<section class="ourCustomers">
    <h2 class="heading">{!! $blocks['HOME-WHAT-OUR-CUSTOMERS-SAY'][0]->description !!}</h2>
    <div class="ourCustomers__inner" style="background-image: url(/images/ourCustomers.png)" data-waypoint="70%">
        <div class="ourCustomers__bg">
            @if(!empty($blocks['HOME-WHAT-OUR-CUSTOMERS-SAY'][0]->children))
            @foreach($blocks['HOME-WHAT-OUR-CUSTOMERS-SAY'][0]->children as $key => $block)
            <div class="ourCustomers__bg__item {{ $key == 0 ? 'active' : '' }}" style="background-image: url({{ $block->photo }})"></div>
            @endforeach 
            @endif
        </div>
        <div class="container">
            <div class="ourCustomers__avatar">
                @if(!empty($blocks['HOME-WHAT-OUR-CUSTOMERS-SAY'][0]->children))
                @foreach($blocks['HOME-WHAT-OUR-CUSTOMERS-SAY'][0]->children as $key => $block)
                <div class="ourCustomers__avatar__item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ $block->icon }}" alt="">
                </div>
                @endforeach
                @endif
            </div>
            <div class="row">
                <div class="col-md-16 offset-md-4 col-lg-12 offset-lg-8 col-xl-11 offset-xl-9" data-paroller-type="foreground" data-paroller-factor="0.3"
                    data-paroller-factor-xs="0.1" data-paroller-factor-sm="0.2">
                    <div class="customers">
                        <div class="customers__inner">
                            @if(!empty($blocks['HOME-WHAT-OUR-CUSTOMERS-SAY'][0]->children))
                            @foreach($blocks['HOME-WHAT-OUR-CUSTOMERS-SAY'][0]->children as $key => $block)
                            <div class="customers__item">
                                {!! $block->name !!}

                                <h4>{!! $block->description !!}</h4>

                                <P>{!! $block->content !!}</P>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['HOME-WHEN-YOU-NEED-US'][0]))
<section class="wereHere">
    <h2 class="heading">{!! $blocks['HOME-WHEN-YOU-NEED-US'][0]->description !!}</h2>

    <div class="container" data-waypoint="70%">
        <div class="row">
            @if(!empty($blocks['HOME-WHEN-YOU-NEED-US'][0]->children))
            @foreach($blocks['HOME-WHEN-YOU-NEED-US'][0]->children as $key => $block)
            <div class="col-md-6 offset-md-{{ $key == 0 ? '0' : '1' }} col-lg-5 offset-lg-1 col-xl-4 offset-xl-2">
                <div class="whyChoose__item">
                    <div class="whyChoose__item__icon">
                        <img src="{{ $block->icon }}" alt="">
                    </div>
                    <h3 class="whyChoose__item__name">{{ $block->name }}</h3>
                    <p class="whyChoose__item__desc">{!! $block->description !!}</p>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['HOME-YOU-CARE'][0]))
<section class="getStarted" style="background-image: url('{!! $blocks['HOME-YOU-CARE'][0]->photo !!}')" data-waypoint="70%"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <h2 class="heading heading--white">{!! $blocks['HOME-YOU-CARE'][0]->description !!}</h2>
    <div class="text-center">
        <a class="btn btn-danger btn-shadow btn-lg" href="{!! $blocks['HOME-YOU-CARE'][0]->url !!}" title="Đăng ký ngay">Đăng ký ngay</a>
    </div>
</section>
@endif

@endsection