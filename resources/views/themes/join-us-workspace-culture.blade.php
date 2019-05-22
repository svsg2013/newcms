@extends('frontend.layouts.master')

@section('style')
@endsection

@section('content')
    @component('themes._component_join-us',['blocks'=>$blocks, 'active_tab'=>1])
        @if($blocks->has('CULTURE') && $bt = $blocks->get('CULTURE')->first())
        <div class="caltureInfo">
            <h2 class="heading">{!! $bt->name !!}</h2>
            {!! $bt->content !!}
        </div>

        @foreach($bt->children as $index=>$child)
            <div class="calture__item">
                <div class="row">
                    <div class="col-md-10">
                        <div class="calture__item__image" data-animated-effect="fadeIn{{$index%2 ? 'Left' : 'Right'}}">
                            <div class="image" style="background-image:url('{{$child->photo}}')"><img src="{{$child->photo}}"></div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="calture__item__des" data-animated-effect="fadeIn{{$index%2 ? 'Right' : 'Left'}}">
                            <h2 class="heading--1">{{$child->name}}</h2>
                            <p>{{$child->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    @endcomponent
@endsection