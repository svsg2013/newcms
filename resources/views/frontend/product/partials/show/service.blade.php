@if($product->blocks->count())
    <div class="panel-group" id="service" role="tablist" aria-multiselectable="true">
        @foreach($product->blocks as $key => $block)
            <div class="panel">
                <div class="panel-heading" role="tab" id="heading-{{ $block->id }}">
                    <h4 class="panel-title">
                        <a role="button" @if($key !== 0) class="collapsed" @endif data-toggle="collapse"
                           data-parent="#service" href="#service-{{ $block->id }}" aria-expanded="true"
                           aria-controls="service-{{ $block->id }}">
                            <i class="icon_toolbox"></i> {{ $block->name ? $block->name : 'Service' }}
                        </a>
                    </h4>
                </div>
                <div id="service-{{ $block->id }}" class="panel-collapse collapse @if($key === 0) in @endif"
                     role="tabpanel" aria-labelledby="heading-{{ $block->id }}">
                    <div class="panel-body">
                        {!! $block->name ? $block->content : trans('page.no_data') !!}
                    </div>
                </div>
            </div>
            @break(!$block->name)
        @endforeach
    </div>
@endif