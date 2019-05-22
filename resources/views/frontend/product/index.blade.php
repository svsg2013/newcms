@extends('frontend.layouts.master')

@section('content')
    <section class="subHeader" style="background-image: url('{{ !empty($banner) ? $banner['image'] : 'http://fakeimg.pl/1600x600/0c8641/000?text=PRODUCTS' }}')">
        <div class="container">
            <h1>{{ !empty($banner) ? $banner['name'] : 'PRODUCTS' }}</h1>
        </div>
    </section>
    <section class="productLanding">

        @include('frontend.layouts.partials.breadcrumb')

        @if(!empty($products['TYPE_MAIN']))
            @include('frontend.product.partials.index.main', ['product_main' => $products['TYPE_MAIN']])
        @endif

        @if(!empty($products['TYPE_SUB']))
            @include('frontend.product.partials.index.sub', ['product_sub' => $products['TYPE_SUB']])
        @endif

        @if(!empty($products['TYPE_SERVICE']))
            @include('frontend.product.partials.index.service', ['product_service' => $products['TYPE_SERVICE']])
        @endif
    </section>
@endsection