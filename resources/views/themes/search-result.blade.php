@extends('frontend.layouts.master')

@section('content')

<!-- Start breadcrumbs-->
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! $blocks['SEARCH-RESULT-BANNER'][0]->photo !!}')"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <h1>{!! $blocks['SEARCH-RESULT-BANNER'][0]->name !!}</h1>
        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
<!-- End breadcrumbs-->
<section class="searchSection">
    <div class="container">
        <div class="searchForm">
            <form action="{{ route('page.search') }}" method="GET">
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="c">
                <input class="form-control" id="search-input" type="text" name="keyword" placeholder="Nhập nội dung tìm kiếm" value="{{ $keyword }}">
                <button class="btn navbar__search__btn" type="submit"><img class="svg" src="/assets/images/icons/ic-search.svg"
                        alt=""></button>
            </form>
        </div>
        <div class="searchResults">
            @if($result_paginate)
                <h2 class="heading">{!! $blocks['SEARCH-RESULT-GENERAL'][0]->name !!}<small>Có {{ count($result) }} kết quả được tìm thấy</small></h2>
                @foreach($result_paginate as $key)
                <div class="searchResult">
                    <h3 class="searchResult__title"><a href="{{ route('page.show', $key->slug) }}">{{ $key->title }}</a></h3>
                    <div class="searchResult__content">
                        {!! words($key->description, 70, '...') !!}
                    </div>
                </div>
                @endforeach

                <div class="paginationDot">
                    {{ $result_paginate->appends(request()->all())->links('vendor.pagination.search') }}
                </div>
            @else
                <div class="searchResults">
                    <h2 class="heading">Kết quả<strong>tìm kiếm</strong><i><img src="/images/ic-search.svg" alt=""></i><small>Không tìm thấy kết quả</small></h2>
                </div>
            @endif
        </div>
        <div class="joinCultureContact__form">
            <div class="joinCultureContact__formInner">
                <div class="row">
                    <div class="col-lg-13">
                        @include('frontend.layouts.partials.alert')
                        {{--  <form class="validate" id="form1" method="POST" action="{{ route('page.storeContact') }}">  --}}
                        <form id="form1" method="POST" action="{{ route('page.storeContact') }}">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="subject" placeholder="Tiêu đề"
                                            required data-msg-required="Vui lòng điền tiêu đề">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="name" placeholder="Họ và Tên"
                                        required data-msg-required="Vui lòng họ tên">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="phone" placeholder="Điện thoại"
                                        required rangelength="10,11" number="true" data-msg-rangelength="Vui lòng chỉ nhập 10 hoặc 11 ký tự số"
                                        data-msg-number="Vui lòng chỉ nhập ký tự số" data-msg-required="Vui lòng cung cấp số di động của bạn">
                                </div>
                                <div class="col-md-10">
                                    <input class="form-control" type="email" name="email" placeholder="Email" required
                                        data-msg-required="Vui lòng cung cấp địa chỉ thư điện tử " data-msg-email="Vui lòng nhập địa chỉ thư điện tử hợp lệ">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-20">
                                    <textarea class="form-control" required data-msg-required="Vui lòng nhập nội dung liên hệ"
                                        placeholder="Nội dung tin nhắn" name="content"></textarea>
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
                            <h4>{!! $blocks['SEARCH-RESULT-CONTACT'][0]->name !!}</h4>
                            <!-- <table>
                                <tr>
                                    <td><img src="/images/ic-phone.svg" alt=""></td>
                                    <td>(038) 2222-9999</td>
                                </tr>
                                <tr>
                                    <td><img src="/images/ic-mail.svg" alt=""></td>
                                    <td><a href="mailto:info@ easycredit.vn">info@easycredit.vn </a></td>
                                </tr>
                                <tr>
                                    <td><img src="/images/ic-pin.svg" alt=""></td>
                                    <td>Tầng 5, 610 Võ Văn Kiệt, Cau Kho ward, District 1, Ho Chi Minh City</td>
                                </tr>
                            </table> -->
                            {!! $blocks['SEARCH-RESULT-CONTACT'][0]->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection