<div class="productBox">
    <div class="productBox__img"
         style="background-image: url('{{ $product->product_image }}')">
        <img src="{{ $product->product_image }}" alt="{{ $product->name }}">
    </div>
    <div class="productBox__footer">
        <h3><a href="{{ $product->url }}" title="{{ $product->name }}">{{ $product->name }}</a></h3>
    </div>

    <div class="productBox__footer productBox__footer--full">
        <h3><a href="{{ $product->url }}" title="Đất cho thuê">{{ $product->name }}</a></h3>
        <p>{{ $product->description }}
        <div class="productBox__footer__links">
            <a href="{{ $product->url }}">{{ trans('button.view_detail') }}</a>

            @if($product->type !== 'TYPE_SERVICE')
                {{--Sản phẩm đóng chai thì chỉ có liên hê--}}
                @if($product->id === 9)
                    <a href="{{ trans('routes.page_contact') }}" title="{{ trans('button.contact') }}">{{ trans('button.contact') }}</a>
                @else
                    <a href="{{ route('product.book') }}">{{ trans('button.book') }}</a>
                @endif
            @endif

        </div>
    </div>
</div>