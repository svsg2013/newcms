@if($blocks && $blocks->has('BANNER') && $bt = $blocks->get('BANNER')->first())
    <section class="breadcrumbs breadcrumbs--blue" style="background-image: url({{$bt->photo}})" data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
        <div class="container text-center">
            <h1>{{$bt->name}}</h1>
            <nav aria-label="breadcrumb">
                @php $breadcrumbs = Breadcrumb::$breadcrumb; @endphp
                @if(!empty($breadcrumbs) && is_array($breadcrumbs) && count($breadcrumbs) > 1)
                    <ol class="breadcrumb">
                        @foreach($breadcrumbs as $key => $value)
                            @if($value["link"])
                                <li class="breadcrumb-item">
                                    <a href="{!! $value["link"] !!}" title="{!! $value["name"] !!}">{!! $value["name"] !!}</a>
                                </li>
                            @else
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ summary($value["name"],55) }}</a></li>
                            @endif
                        @endforeach
                    </ol>
                @endif
            </nav>
        </div>
    </section>
@endif