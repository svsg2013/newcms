@extends('frontend.layouts.master')

@section('content')

<!-- Start breadcrumbs-->
@if(!empty($blocks['CUSTOMER-DISBURSEMEMT-BANNER'][0]))
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! $blocks['CUSTOMER-DISBURSEMEMT-BANNER'][0]->photo !!}')" data-paroller-factor="0.4"
    data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <!-- <h1>Nhận khoản giải ngân</h1> -->
        <h1>{!! $blocks['CUSTOMER-DISBURSEMEMT-BANNER'][0]->name !!}</h1>

        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
@endif
<!-- End breadcrumbs-->

@if(!empty($blocks['CUSTOMER-DISBURSEMEMT-GENERAL'][0]))
<section class="boxquote">
    <div class="container text-center">
        <h2 class="boxquote__head">
            {!! $blocks['CUSTOMER-DISBURSEMEMT-GENERAL'][0]->name !!}
        </h2>

        <div class="boxquote__content">
            {!! $blocks['CUSTOMER-DISBURSEMEMT-GENERAL'][0]->content !!}
        </div>
    </div>
</section>
@endif

<section class="method">
    <div class="container">
        <h2 class="heading">
            {!! !empty($blocks['CUSTOMER-DISBURSEMEMT-METHOD'][0]) ? $blocks['CUSTOMER-DISBURSEMEMT-METHOD'][0]->name : '' !!}
        </h2>

        <div class="methodTab">
            <ul class="methodTab__nav">
                @if(!empty($blocks['CUSTOMER-DISBURSEMEMT-METHOD'][0]->children)) 
                @foreach($blocks['CUSTOMER-DISBURSEMEMT-METHOD'][0]->children as $key => $block)
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
                @if(!empty($blocks['CUSTOMER-DISBURSEMEMT-METHOD'][0]->children)) 
                @foreach($blocks['CUSTOMER-DISBURSEMEMT-METHOD'][0]->children as $key => $block)
                <div class="methodTab__item {{ $key == 0 ? 'active' : '' }}">
                    {!! $block->content !!}
                    
                    @if($key == 0)
                    <div class="boxLocator">
                        <h3 class="heading">CHỌN ĐỊA ĐIỂM
                            <strong>GẦN NHẤT</strong>
                        </h3>
                        <div class="bh-sl-form-container">
                            <form id="bh-sl-user-location" method="post" action="#">
                                {{ csrf_field() }}
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

@if(!empty($blocks['CUSTOMER-DISBURSEMEMT-WHY-CHOOSE'][0]))
<section class="whyChoose" id="whyChoose" data-waypoint="70%">
    <h2 class="heading">
        {!! $blocks['CUSTOMER-DISBURSEMEMT-WHY-CHOOSE'][0]->name !!}
    </h2>

    <div class="container">
        <div class="row">
            @if(!empty($blocks['CUSTOMER-DISBURSEMEMT-WHY-CHOOSE'][0]->children)) 
            @foreach($blocks['CUSTOMER-DISBURSEMEMT-WHY-CHOOSE'][0]->children as $key => $block)
            <div class="col-md-6 offset-md-{{ $key == 0 ? '0' : '1' }} col-lg-5 offset-lg-{{ $key == 0 ? '1' : '2' }} col-xl-4 offset-xl-2">
                <div class="whyChoose__item">
                    <div class="whyChoose__item__icon">
                        <img src="{!! $block->icon !!}" alt="{!! $block->name !!}">
                    </div>
                    <h3 class="whyChoose__item__title">
                        {!! $block->name !!}
                    </h3>

                    <p class="whyChoose__item__desc">
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

@if(!empty($blocks['CUSTOMER-DISBURSEMEMT-FOOTER'][0]))
<section class="getStarted" style="background-image: url('{!! $blocks['CUSTOMER-DISBURSEMEMT-FOOTER'][0]->photo !!}')" data-waypoint="70%"
    data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container">
        <h2 class="heading heading--white">
            {!! $blocks['CUSTOMER-DISBURSEMEMT-FOOTER'][0]->name !!}
        </h2>

        <div class="text-center">
            <a class="btn btn-danger btn-shadow btn-lg" href="{!! $blocks['CUSTOMER-DISBURSEMEMT-FOOTER'][0]->url !!}">XEM THÊM QUẢN LÝ KHOẢN VAY</a>
        </div>
    </div>
</section>
@endif

@endsection

@section('script')

<script type="text/javascript" src="https://googlemaps.github.io/js-marker-clusterer/src/markerclusterer.js?ver=0.1"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ config('services.google.map_key') }}&amp;libraries=places"></script>
<script src="/assets/js/jquery.storelocator.js"></script>
<script src="/assets/js/address.api.js"></script>

@endsection