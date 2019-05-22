@extends('frontend.layouts.master')

@section('content')
    <section class="subHeader" style="background-image: url('{{ $product->banner }}')">
        <div class="container">
            <h1>{{ $product->name }}</h1>
        </div>
    </section>

    <section class="product product--services">
        <div class="container">
            <div class="about__content">
                @include('frontend.layouts.partials.breadcrumb')

                <h2 class="content__heading">{{ $product->name }}</h2>

                @if($product->medias->count())
                    <div class="product__serviceSlide--wrap">
                        <div class="product__serviceSlide">
                            @foreach($product->medias->chunk(2) as $chunk)
                                <div class="product__serviceSlide__item">
                                    @foreach ($chunk as $media)
                                        <div class="product__serviceSlide__item__img">
                                            <img src="{{ $media->path }}" alt="{{ $product->name }}">
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        <!-- / slide -->
                    </div>
                @endif

                <p>{{ trans('product.list_services') }}</p>


                @include('frontend.product.partials.show.service')


                <div class="product__serviceContact">
                    <div class="row">
                        <div class="col-md-12 col-lg-5">
                            <h3 class="text-uppercase">{{ trans('service.company') }}</h3>
                            <h4>{{ trans('service.certificate') }}</h4>
                            <h5>ISO 9001:2015 – ISO 14001:2015</h5>
                        </div>
                        <div class="col-md-8 col-lg-4">
                            <h3>{{ trans('service.contact_title') }}:</h3>
                            <p>{{ trans('service.contact_name') }}<br/>
                                {{ trans('service.phone') }}: 028 3781 8929 (Ext: 124)<br/>
                                {{ trans('service.email') }}: mai.lt@longhau.com.vn</p>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <p><a href="{{ route('page.coming_soon') }}" class="btn btn-lh">{{ trans('service.btn-news') }} <i class="arrow_right"></i></a></p>
                            <p><a href="{{ route('page.coming_soon') }}" class="btn btn-lh">{{ trans('service.btn-register') }} <i class="arrow_right"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.product.partials.show.related')
@endsection