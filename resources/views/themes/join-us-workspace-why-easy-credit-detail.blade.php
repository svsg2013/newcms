@extends('frontend.layouts.master')

@section('style')
@endsection

@section('content')
    @component('themes._component_join-us',['blocks'=>$blocks, 'active_tab'=>2])
        <div class="joinCultureWhyContent"><a class="backList" href="/ly-do-gia-nhap-EASY-CREDIT"></a>
            <div class="joinCultureWhyContent__title">
                <h3>{{$page_block->name}}</h3><span class="text-photo"> {{$page_block->medias->count()}} Photos  .  Updated {{Date2String($page_block->updated_at)}}</span>
                <p>{{$page_block->description}}</p>
            </div>
            <div class="gridPhoto">
                <div class="row">
                    @foreach($page_block->medias as $item)
                    <div class="col-lg-4 col-md-5 col-sm-10 col-10">
                        <div class="gridPhoto__item">
                            <div class="image"><a style="background-image:url('{{$item->path}}')" href="{{$item->path}}" rel="gallery"><img src="{{$item->path}}" alt=""></a></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endcomponent
@endsection