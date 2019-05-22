<div class="product__tabs">
    <div class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            @foreach($product->blocks as  $block)
                <li role="presentation" @if ($loop->first) class="active" @endif>
                    <a href="#{{ $block->type }}-{{ $block->id }}" aria-controls="{{ $block->type }}-{{ $block->id }}" role="tab" data-toggle="tab">{{ $block->name }}</a>
                </li>
            @endforeach
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            @foreach($product->blocks as  $block)
            <div role="tabpanel" class="tab-pane @if ($loop->first) active @endif" id="{{ $block->type }}-{{ $block->id }}">
                @switch($block->type)
                    @case('TYPE_IMAGE_MAP')
                        @php $image_map = $block->image_map; @endphp
                        @if($image_map)
                            <div class="maplayer" >
                                <img class="map" src="{{ $image_map->image }}" usemap="#imap-map-{{ $image_map->id }}">
                                <map name="imap-map-{{ $image_map->id }}" id="imap-map-{{ $image_map->id }}">
                                    @foreach($image_map->areas as $area)
                                        <area shape="{{ $area->shape }}" coords="{{ $area->coords }}" href="http://fakeimg.pl/1x1/ff0000/000" alt="{{ $area->content }}">
                                    @endforeach
                                </map>
                            </div>
                        @endif
                    @break

                    @case('TYPE_PHOTO')
                        @if($block->path)
                            <div class="imageZoom"
                                 data-image="{{ $block->path }}"
                                 data-image-zoom="{{ $block->path }}"
                                 data-size="258">
                            </div>
                        @endif
                    @break

                    @case('TYPE_PHOTO_TRANSLATION')
                        @if($block->photo_translation)
                            <div class="imageZoom"
                                 data-image="{{ $block->photo_translation }}"
                                 data-image-zoom="{{ $block->photo_translation }}"
                                 data-size="258">
                            </div>
                        @endif
                    @break

                    @case('TYPE_CONTENT')
                        <div>
                            {!! $block->content !!}
                        </div>
                    @break
                @endswitch
            </div>
            @endforeach
        </div>
    </div>
</div>