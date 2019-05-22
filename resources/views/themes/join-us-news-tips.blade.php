@extends('frontend.layouts.master')

@section('style')
@endsection

@section('content')
    @include('themes.partials.breadcrumb')

    <section class="joinCulture" id="news">
        <div class="container">
            @if($blocks->has('TIPS') && $bt = $blocks->get('TIPS')->first())
            <div class="joinCultureNews">
                <div class="joinCultureNews__intro">
                    <h2 class="heading">{!! $bt->name !!}</h2>
                    {!! $bt->content !!}
                </div>
                <div class="joinCulture__content">
                    <ul class="nav-link">
                        <li class="{{request()->get('type',2)==2 ? 'active' : ''}}"><a href="{{getPageUrlByCode('JOIN-US-NEWS-TIPS',['type'=>2] )}}">THÔNG TIN NHÂN SỰ </a></li>
                        <li class="{{request()->get('type',2)==3 ? 'active' : ''}}"><a href="{{getPageUrlByCode('JOIN-US-NEWS-TIPS',['type'=>3] )}}">TƯ VẤN TUYỂN DỤNG</a></li>
                    </ul>
                    {{-- <form class="joinCultureNews__form" action="{{url()->current()}}">
                        <input type="hidden" name="type" value="{{ request()->get('type',2) }}">
                        <input class="form-control" name="q" value="{{request()->get('q')}}" type="text">
                        <button class="btn-search"><i class="icon_search"></i></button>
                    </form> --}}
                    <div class="gridNews">
                        @foreach($news as $item)
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
                    <div class="paginationDot">
                        {{$news->appends(request()->all())->links()}}
                    </div>
                    <div class="group-link text-center"><a class="btn btn-danger btn-lg" href="{{ !empty(\App\Models\PageBlock::where('code', 'JOIN-US-NEWS-TIPS-URL')->first()) ? \App\Models\PageBlock::where('code', 'JOIN-US-NEWS-TIPS-URL')->first()->url : '' }}">GIA NHẬP NGAY  </a></div>
                </div>
            </div>
            @endif
        </div>
    </section>


    @include('themes.partials.register_career')
@endsection
