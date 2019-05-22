@extends('frontend.layouts.master')

@section('content')
    @php $banner = Slider::$banner; @endphp
    <section class="subHeader subHeader--news-page" style="background-image: url('{{ !empty($baner_top) ? $baner_top['image'] : 'http://fakeimg.pl/1600x600/0c8641/000?text=COMMUNICATION' }}')">
        <div class="container">
            <h1>{{ trans('menu.media') }}</h1>

            @include('frontend.layouts.partials.breadcrumb')
        </div>

        @include('frontend.communicate.partials.slider')
    </section>

    <section class="about about--awards">
        <div class="container">

            @include('frontend.communicate.partials.nav-tabs')
            
            @if($category->code == 'NEWS-EVENTS')
                @include('frontend.communicate.news.partials.slider_news_events')
            @endif

            <div class="news-highlights">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 news-highlights__item">
                                @foreach($top_news as $key => $rs)
                                <div class="image {{ $key ? 'hidden' : '' }}" data-value="{{ $key + 1 }}" style="background-image: url('{{ $rs->image }}')">
                                    <a href="{{ route('news.show', ['category_slug' => $category->slug, 'slug' => $rs->slug] ) }}">
                                        <img src="{{ $rs->image }}" alt="{{ $rs->title }}">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            @if($top_news->count())
                            <div class="col-md-6 faqs__services news-highlights__item">
                                <div class="row">
                                    <div class="faqsList">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 faqs__services__scroll">
                                                <div class="faqsBox">
                                                    <div class="faqs__footer">
                                                        <div class="faqs__footer__info faqs__footer__info--news" id="services-before" data-simplebar="init">
                                                            <div class="simplebar-track vertical">
                                                                <div class="simplebar-scrollbar"></div>
                                                            </div>
                                                            <div class="simplebar-track horizontal">
                                                                <div class="simplebar-scrollbar"></div>
                                                            </div>
                                                            <div class="simplebar-scroll-content">
                                                                <div class="simplebar-content">
                                                                    <ul>
                                                                        @foreach($top_news as $key => $rs)
                                                                            <li class="{{ $key === 0 ? 'active' : '' }}" data-value="{{ $key + 1 }}">
                                                                                <a href="{{ route('news.show', ['category_slug' => $category->slug, 'slug' => $rs->slug] ) }}" title=" {{ $rs->title }}">
                                                                                    {{ $rs->title }}
                                                                                    <span class="date"><i class="arrow_carrot-right"></i>{{ $rs->publish_at_format }}</span>
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                         
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @else
                                <p class="alert alert-info">
                                     {{ trans('page.no_data') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="news-list">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($list as $rs)
                                <div class="col-lg-3 col-sm-4 col-xs-6 news-list__item">
                                    <a class="linkTo" href="{{ route('news.show', ['category_slug' => $category->slug, 'slug' => $rs->slug] ) }}"></a>
                                    <div class="image" style="background-image: url('{{ $rs->image }}')">
                                        <div class="overlay"></div>
                                        <img src="{{ $rs->image }}" alt="{{ $rs->title }}">
                                        <span></span>
                                    </div>
                                    <div class="des">
                                        <p class="date">
                                            <i class="arrow_carrot-right"></i>{{ $rs->publish_at_format }}</p>
                                        <p><a href="{{ route('news.show', ['category_slug' => $category->slug, 'slug' => $rs->slug] ) }}">{{  $rs->title }}</a></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- / news list -->

            {{ $list->links('vendor.pagination.long-hau') }}

            <!-- pagination -->
            @if($category->code == 'NEWS-EVENTS')
                <div class="banner-event">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="banner-event__image">
                                    <a><img src="{{ !empty($events_bottom) ? $events_bottom['image'] : 'http://fakeimg.pl/1600x600/0c8641/000?text=NEWS-EVENTS' }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </section>
@endsection

