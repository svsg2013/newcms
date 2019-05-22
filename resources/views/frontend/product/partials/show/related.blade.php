<section class="productRelated">
    <div class="headings text-center">
        <h2><span>{{ trans('product.view_more') }}</span></h2>
    </div>
    <div class="productRelated__content">
        @foreach($products_other as $item)
            <div class="productRelated__item">
                <div class="productBox">
                    <div class="productBox__img"
                         style="background-image: url('{{ $item->product_image }}')">
                        <img src="{{ $item->product_image }}" alt="{{ $item->name }}">
                    </div>
                    <div class="productBox__footer">
                        <h3>
                            <a href="{{ $item->url }}" title="{{ $item->product_image }}">{{ $item->name }}</a>
                        </h3>
                    </div>

                    <div class="productBox__footer productBox__footer--full">
                        <h3><a href="{{ $item->url }}" title="{{ $item->product_image }}">{{ $item->name }}</a></h3>
                        <p>{{ $item->description }}</p>

                        @if($item->type !== 'TYPE_SERVICE')
                            <div class="productBox__footer__links">
                                <a href="{{ $item->url }}" title="{{ trans('button.view_detail') }}">{{ trans('button.view_detail') }}</a>

                                {{--Sản phẩm đóng chai thì chỉ có liên hê--}}
                                @if($item->id === 9)
                                    <a href="{{ trans('routes.page_contact') }}" title="{{ trans('button.contact') }}">{{ trans('button.contact') }}</a>
                                @else
                                    <a href="{{ route('product.book') }}" title="{{ trans('button.book') }}">{{ trans('button.book') }}</a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>