@extends('frontend.layouts.master')

@section('style')
@endsection

@section('content')
    @include('themes.partials.breadcrumb')

    <section class="joinCulture">
        <div class="container">
            <div class="joinCultureNews"><a class="backList" href="{{getPageUrlByCode('JOIN-US-NEWS-TIPS',['type'=>$news->category->code] )}}"></a>
                <div class="joinCultureNews__title joinCultureWhyContent__title">
                    <h3>{{$news->title}}</h3>
                    <span class="text-photo"> Friday, 20/07/2018</span>
                    <p>{{$news->description}}</p>
                </div>
            </div>
            <div class="joinCultureNews__content document">
                {!! $news->content !!}
            </div>
            <div class="joinCultureNews">
                <div class="text-center"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}"><img src="assets/images/share.png" alt=""></a></div>
                <div class="tagcontent"><a href="#">easy credit</a><a href="#">cv</a><a href="#">resume</a><a href="#">interview</a><a href="#">hiring</a></div>
                <h2 class="heading">tin tức khác</h2>
                <div class="gridNews gridNewsSlider">
                    @foreach($news_relative as $item)
                    <div class="gridNews__wrap">
                        <div class="gridNews__item">
                            <div class="gridNews__item__image">
                                <div class="image">
                                    <a style="background-image:url('{{$item->image}}')" href="{{route('frontend.get_news_detail',['page_slug'=>$page->slug,'news_slug'=>$item->slug])}}">
                                        <img src="{{$item->image}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="gridNews__item__info">
                                <div class="date">{{$item->publish_at_format}}</div><a href="{{route('frontend.get_news_detail',['page_slug'=>$page->slug,'news_slug'=>$item->slug])}}">{{$item->title}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="group-link text-center"><a class="btn btn-danger btn-lg" href="{{getPageUrlByCode('JOIN-US-CAREER-OPPORTUNITIES')}}">gia nhập ngay</a></div>
            </div>
        </div>
    </section>

    @include('themes.partials.register_career')
@endsection
