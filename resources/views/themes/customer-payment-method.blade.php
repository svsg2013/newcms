@extends('frontend.layouts.master')

@section('content')

<!-- Start breadcrumbs-->
@if(!empty($blocks['CUSTOMER-PAYMENT-METHOD-BANNER'][0]))
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! $blocks['CUSTOMER-PAYMENT-METHOD-BANNER'][0]->photo !!}')" data-paroller-factor="0.4"
    data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <!-- <h1>Phương thức thanh toán</h1> -->
        <h1>{!! $blocks['CUSTOMER-PAYMENT-METHOD-BANNER'][0]->name !!}</h1>

        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
@endif
<!-- End breadcrumbs-->

@if(!empty($blocks['CUSTOMER-PAYMENT-METHOD-GENERAL'][0]))
<section class="boxquote boxquote--3">
    <div class="container text-center">
        <h2 class="boxquote__head">
            {!! $blocks['CUSTOMER-PAYMENT-METHOD-GENERAL'][0]->name !!}
        </h2>

        <div class="boxquote__content">
            {!! $blocks['CUSTOMER-PAYMENT-METHOD-GENERAL'][0]->content !!}
        </div>
    </div>
</section>
@endif

<section class="method">
    <div class="container">
        <h2 class="heading">{!! !empty($blocks['CUSTOMER-PAYMENT-METHOD-DETAIL'][0]) ? $blocks['CUSTOMER-PAYMENT-METHOD-DETAIL'][0]->name : '' !!}</h2>
        <div class="methodTab">
            <ul class="methodTab__nav methodTab__nav--2">
                @if(!empty($blocks['CUSTOMER-PAYMENT-METHOD-DETAIL'][0]) && !empty($blocks['CUSTOMER-PAYMENT-METHOD-DETAIL'][0]->children)) 
                @foreach($blocks['CUSTOMER-PAYMENT-METHOD-DETAIL'][0]->children as $key => $block)
                <li {{ $key == 0 ? 'class="active"' : '' }}>
                    <img class="methodTab__nav__icon" src="{!! $block->icon !!}" alt="">

                    <h3 class="methodTab__nav__title">
                        {!! $block->name !!}
                    </h3>
                </li>
                @endforeach
                @endif
            </ul>
            <div class="methodTab__content">
                @if(!empty($blocks['CUSTOMER-PAYMENT-METHOD-DETAIL'][0]) && !empty($blocks['CUSTOMER-PAYMENT-METHOD-DETAIL'][0]->children)) 
                @foreach($blocks['CUSTOMER-PAYMENT-METHOD-DETAIL'][0]->children as $key => $block)
                <div class="methodTab__item {{ $key == 0 ? 'active' : '' }}">
                    
                    {!! $block->content !!}
                    
                    @if($key == 0)
                    <div class="boxLocator">
                        <h3 class="heading">Tìm địa điểm
                            <strong>Gần nhất</strong>
                        </h3>
                        <div class="bh-sl-form-container">
                            <form id="bh-sl-user-location" method="post" action="#">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <div class="form-input">
                                        <input class="form-control" id="bh-sl-search" type="text" name="bh-sl-search" placeholder="Nhập từ khóa để lọc kết quả">
                                    </div>
                                    <button class="btn" id="bh-sl-submit" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                                <div class="bh-sl-filters-container">
                                    <ul class="bh-sl-filters" id="category-filters-container1">
                                        @if(!empty($address_category))
                                        @foreach($address_category as $category)
                                        <li>
                                            <label>
                                                <input type="checkbox" name="category" value="{!! $category->name !!}">
                                                <span>{!! $category->name !!}</span>
                                            </label>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                    <button class="bh-sl-mylocation" id="bh-sl-mylocation" type="submit">Địa điểm gần nhất</button>
                                </div>
                            </form>
                        </div>
                        <div class="bh-sl-map-container" id="bh-sl-map-container">
                            <div class="bh-sl-map" id="bh-sl-map"></div>
                            <div class="bh-sl-loc-list">
                                <ul class="list"></ul>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

@if(!empty($blocks['CUSTOMER-PAYMENT-METHOD-FOOTER'][0]))
<section class="getStarted" style="background-image: url('{!! $blocks['CUSTOMER-PAYMENT-METHOD-FOOTER'][0]->photo !!}')" data-waypoint="70%"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container">
        <h2 class="heading heading--white">{!! $blocks['CUSTOMER-PAYMENT-METHOD-FOOTER'][0]->name !!}
        </h2>
        <div class="text-center">
            <a class="btn btn-danger btn-shadow btn-lg" href="{!! $blocks['CUSTOMER-PAYMENT-METHOD-FOOTER'][0]->url !!}">XEM THÊM QUẢN LÝ KHOẢN VAY</a>
        </div>
    </div>
</section>
@endif

@endsection

@section('script')

<script type="text/javascript" src="https://googlemaps.github.io/js-marker-clusterer/src/markerclusterer.js?ver=0.1"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ config('services.google.map_key') }}&amp;libraries=places"></script>
<script src="/assets/js/jquery.storelocator.js"></script>
<script src="/assets/js/address.payment.method.api.js"></script>

@endsection