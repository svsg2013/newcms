<section class="productLanding__services">
    <div class="headings text-center">
        <h2><span>{{ trans('product.TYPE_SERVICE') }}</span></h2>
    </div>

    <div class="productList">
        @foreach($product_service as $key => $product)
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="productBox">
                    <div class="productBox__img" style="background-image: url('{{ $product->product_image }}')">
                        <img src="{{ $product->product_image }}" alt="{{ $product->name }}">
                    </div>
                    <div class="productBox__footer">
                        <h3><a href="{{ $product->url }}" title="{{ $product->name }}">{{ $product->name }}</a></h3>
                    </div>

                    <div class="productBox__footer productBox__footer--full">
                        <h3><a href="{{ $product->url }}" title="Đất dân cư">{{ $product->name }}</a></h3>
                        <div class="productBox__footer__links">
                            <a href="{{ $product->url }}">{{ trans('button.view_detail') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / col -->
            @break($key === 0)
        </div>
        @endforeach
        <!-- / row -->

        <div class="row">
            @foreach($product_service as $product)
                @continue($loop->index === 0)

                <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="productBox">
                    <div class="productBox__img"
                         style="background-image: url('{{ $product->product_image }}')">
                        <img src="{{ $product->product_image }}" alt="{{ $product->name }}">
                    </div>
                    <div class="productBox__footer">
                        <h3><a href="{{ $product->url }}" title="{{ $product->name }}">{{ $product->name }}</a></h3>
                    </div>

                    <div class="productBox__footer productBox__footer--full">
                        <h3>{{ $product->name }}</h3>
						@php
							$id_tmp = 'services-process';
							if($loop->index === 1){
								$id_tmp = 'services-before';
							}
							else if($loop->index === 2){
								$id_tmp = 'services-insite';
							}
						@endphp
                        <div class="productBox__footer__info" id="{{ $id_tmp }}">
                            {!! $product->content !!}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- / col -->
        </div>
        <!-- / row -->
    </div>
</section>