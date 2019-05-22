@extends('frontend.layouts.master')

@section('style')
@endsection

@section('content')
    @component('themes._component_join-us',['blocks'=>$blocks, 'active_tab'=>2])
        @if($blocks->has('REASON') && $bt = $blocks->get('REASON')->first())
            <div class="joinCultureWhy__slider">
                <h2 class="heading">{!! $bt->name !!}</h2>
                <div class="joinCultureWhy__sliderInner">
                    <div class="sliderNav">
                        @foreach($bt->children as $child)
                        <div class="sliderNavItem" data-animated-effect="fadeInUp">
                            <div class="sliderNavItem--icon"><img src="{{$child->icon}}" alt=""></div>
                            <div class="sliderNavItem--info">
                                <h4>{!! $child->name !!}</h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="sliderFor">
                        @foreach($bt->children as $child)
                        <div class="sliderForItem">
                            <p>{{$child->description}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        @if($blocks->has('EVENT') && $bt = $blocks->get('EVENT')->first())
        <div class="joinCultureWhy__staff">
            <h2 class="heading">{!! $bt->name !!}</h2>
            <div class="staffSlider" id="staffSlider">
                @foreach($bt->children as $child)
                <div class="staffSlider__item">
                    <div class="staffSlider__item__image">
                        <div class="image"><a style="background-image:url('{{$child->photo}}')" href="{{ route('frontend.join_us_why_detail',['page_slug'=>$page->slug,'block_slug'=>str_slug($child->name), 'page_id'=>$child->id]) }}"></a></div>
                    </div>
                    <div class="staffSlider__item__info"><a href="{{ route('frontend.join_us_why_detail',['page_slug'=>$page->slug,'block_slug'=>str_slug($child->name), 'page_id'=>$child->id]) }}">{{$child->name}}</a>
                        <p class="note"> {{$child->medias->count()}} Photos</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    @endcomponent
@endsection