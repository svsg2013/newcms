<section class="productLanding__primary">
    <div class="headings text-center">
        <h2><span>{{ trans('product.TYPE_MAIN') }}</span></h2>
    </div>

    <div class="productList">
        <div class="row">
            @foreach($product_main as $key => $product)
            <div class="{{ $key < 2 ? 'col-sm-12 col-md-6' : 'col-sm-12 col-md-6 col-lg-4' }}">
                @include('frontend.product.partials.productBox', ['product' => $product])
            </div>
            @endforeach
            <!-- / col -->
        </div>
        <!-- / row -->
    </div>
</section>