<section class="productLanding__second">
    <div class="headings text-center">
        <h2><span>{{ trans('product.TYPE_SUB') }}</span></h2>
    </div>

    <div class="productList">
        <div class="row">
            @foreach($product_sub as $key => $product)
                <div class="col-sm-12 col-md-6">
                    @include('frontend.product.partials.productBox', ['product' => $product])
                </div>
                <!-- / col -->
            @endforeach
        </div>
        <!-- / row -->
    </div>
</section>