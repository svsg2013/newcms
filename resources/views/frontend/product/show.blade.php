@extends('frontend.layouts.master')

@section('style')
<style>
    .qtip-content .img{
        display: none;
    }
</style>
@endsection

@section('content')
    <section class="subHeader" style="background-image: url('{{ $product->banner }}')">
        <div class="container">
            <h1>{{ $product->name }}</h1>
        </div>
    </section>

    <section class="product">

        @include('frontend.layouts.partials.breadcrumb')

        <div class="container">
            <div class="product__content">
                <h2 class="content__heading product__heading">
                    {{ $product->name }}
                </h2>
                <div class="product__desc">
                    {!! $product->content !!}
                </div>
            </div>
        </div>

        @if($product->medias->count())
        <div class="product__image">
            @foreach($product->medias as $media)
            <div class="product__image__item">
                <img src="{{ $media->path }}" alt="{{ $product->name }}">
            </div>
            <!-- / item -->
            @endforeach
        </div>
        @endif

        @if($product->blocks->count())
            @include('frontend.product.partials.show.tabs')
        @endif
        <!--/ tabs -->

        <div class="product__placeholder"></div> <!-- placeholder -->
    </section>

    @include('frontend.product.partials.show.related')
@endsection

@section('book')
    {{--Sản phẩm đóng chai thì chỉ có liên hê--}}
    @if($product->id === 9)
        <a href="{{ trans('routes.page_contact') }}" class="reservation btn">{{ trans('button.contact_to_buy') }}</a>
    @else
        <a href="{{ route('product.book') }}" class="reservation btn">{{ trans('button.book') }}</a>
    @endif
@endsection