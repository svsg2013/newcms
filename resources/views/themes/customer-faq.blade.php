@extends('frontend.layouts.master')

@section('content')

<!-- Start breadcrumbs-->
@if(!empty($blocks['CUSTOMER-FAQ-BANNER'][0]))
<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('{!! $blocks['CUSTOMER-FAQ-BANNER'][0]->photo !!}')" data-paroller-factor="0.4"
    data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        
        <h1>{!! $blocks['CUSTOMER-FAQ-BANNER'][0]->name !!}</h1>

        <nav aria-label="breadcrumb">
            @include('frontend.layouts.partials.breadcrumb')
        </nav>
    </div>
</section>
@endif
<!-- End breadcrumbs-->


<section class="faqs">
    <div class="container container--faqs">
        <div class="row faqs__intro">
            <div class="col-lg-11 text-center text-lg-left">

                <h2 class="heading text-center text-lg-left">
                    {!! !empty($blocks['CUSTOMER-FAQ-GENERAL'][0]) ? $blocks['CUSTOMER-FAQ-GENERAL'][0]->name : '' !!}
                </h2>

                {!! !empty($blocks['CUSTOMER-FAQ-GENERAL'][0]) ? $blocks['CUSTOMER-FAQ-GENERAL'][0]->content : '' !!}
            </div>
            <div class="col-lg-9 text-center text-lg-right">
                <img src="{!! $blocks['CUSTOMER-FAQ-GENERAL'][0]->photo !!}" alt="">
            </div>
        </div>
        <div class="promotionSearch">
            <form method="GET" action="{{ route('search.faq') }}">
                {{ csrf_field() }}
                <input type="hidden" value="c" name="_token">
                <div class="table-full">
                    <div class="table-cell" data-animated-effect="fadeInLeft">
                        <div class="wrapIpt">
                            <input class="form-control" type="text" name="keyword" value="{{ !empty($keyword) ? $keyword : '' }}" placeholder="Bạn có câu hỏi hay thắc mắc gì? Hãy nhập vào ô tìm kiếm.">
                        </div>
                    </div>
                    <div class="table-cell" data-animated-effect="fadeInRight">
                        <button class="btn btn-additional" type="submit">
                            <span>
                                <span data-text="Tìm kiếm">Tìm kiếm</span>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @if(empty($result))
        <div class="row faqs__desc">
            @if(!empty($faq_category))
            @foreach($faq_category as $category)
            <div class="col-md-10">
                <div class="faqs__desc__inner" data-waypoint="70%">
                    <img class="faqs__desc__icon" src="{{ $category->icon }}" alt="">
                    <h3 class="faqs__desc__head" data-tab="{{ $category->slug }}">{!! $category->name !!}</h3>
                    {{-- <div class="faqs__desc__body">
                        @if(count($category->faqs))
                        @foreach($category->faqs->take(5) as $faq)
                        <p>{!! $faq->question !!}</p>
                        @endforeach
                        @endif
                    </div> --}}
                </div>
            </div>
            @endforeach
            @endif
        </div>
        @endif
        
    </div>

    @if(empty($result))
    <div class="container faqs__detail">
        <h3 class="faqs__detail__head">{{ count($faq_category) ? $faq_category[0]->name : '' }}</h3>
        <div class="csv--accordion" data-waypoint="70%">
            @if(!empty($faq_category))
            @foreach($faq_category as $key => $category)
            <div class="panel-group {{ $key == 0 ? 'active' : '' }}" id="{{ $category->slug }}" role="tabpanel" aria-multiselectable="true">
                @if(count($category->faqs))
                @foreach($category->faqs as $key2 => $faq)
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingcsvitem1">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#{{ $category->slug }}" href="#collapsecsvitem{{ $faq->id }}" aria-expanded="true"
                                aria-controls="collapseOne">
                                <span class="icon-tab"></span>
                                <span class="heading-tab">{{ $key2 + 1 }}. {!! $faq->question !!}?</span>
                            </a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapsecsvitem{{ $faq->id }}" role="tabpanel" aria-labelledby="headingcsvitem{{ $faq->id }}" data-parent="#{{ $category->slug }}">
                        <div class="panel-body">
                            <div class="media">
                                <div class="media-body">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            @endforeach
            @endif
        </div>
    </div>
    @endif

    @if(!empty($result) && count($result))
    <div class="container faqs__detail">
        <h3 class="faqs__detail__head">Có {{ count($result) }} kết quả </h3>
        <div class="csv--accordion" data-waypoint="70%">
            <div class="panel-group active" role="tabpanel" aria-multiselectable="true">
                @foreach($result as $key => $faq)
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingcsvitem1">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" href="#collapsecsvitem{{ $faq->id }}" aria-expanded="true"
                                aria-controls="collapseOne">
                                <span class="icon-tab"></span>
                                <span class="heading-tab">{{ $key + 1 }}. {!! $faq->question !!}?</span>
                            </a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse in" id="collapsecsvitem{{ $faq->id }}" role="tabpanel" aria-labelledby="headingcsvitem{{ $faq->id }}">
                        <div class="panel-body">
                            <div class="media">
                                <div class="media-body">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

</section>

@if(!empty($blocks['CUSTOMER-FAQ-CALL'][0]))
<section class="faqsContact">
    <div class="faqsContact__intro" data-waypoint="70%">
        <div class="faqsContact__intro__inner" style="background-image: url('{!! $blocks['CUSTOMER-FAQ-CALL'][0]->photo !!}')"></div>
        <div class="container">
            
            <h2 class="heading">
                {!! $blocks['CUSTOMER-FAQ-CALL'][0]->name !!}
            </h2>

            <div class="faqsContact__intro__content">
                {!! $blocks['CUSTOMER-FAQ-CALL'][0]->description !!}
            </div>

            <div class="faqsContact__intro__footer">
                <a class="btn btn-danger btn-shadow" href="{!! $blocks['CUSTOMER-FAQ-CALL'][0]->url !!}">GỌI LẠI NGAY</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="faqsContact__info" data-waypoint="70%">
            {!! $blocks['CUSTOMER-FAQ-CALL'][0]->content !!}
        </div>
    </div>
</section>
@endif

@if(!empty($blocks['CUSTOMER-FAQ-FOOTER'][0]))
<section class="faqsCta">
    <div class="container">
        <div class="faqsCta__inner">
            @if(!empty($blocks['CUSTOMER-FAQ-FOOTER'][0]->children)) 
            @foreach($blocks['CUSTOMER-FAQ-FOOTER'][0]->children as $key => $block)
            <div class="whyChoose__item {{ $key == 2 ? 'chat-script-btn' : '' }}" data-waypoint="70%">
                <div class="whyChoose__item__icon">
                    <img src="{!! $block->icon !!}" alt="">
                </div>
                <h3 class="whyChoose__item__name">{!! $block->name !!}</h3>

                <p class="whyChoose__item__desc">
                    {!! $block->description !!}
                </p>
                <div class="whyChoose__item__line">
                    <span></span>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif

@endsection