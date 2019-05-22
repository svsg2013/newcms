@php $breadcrumbs = Breadcrumb::$breadcrumb; @endphp
@if(!empty($breadcrumbs) && is_array($breadcrumbs) && count($breadcrumbs) > 1)
    <section class="breadcrumbs breadcrumbs--blue" style="background-image: url({{$background or ''}})" data-paroller-factor="0.4" data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
        <div class="container text-center">
            <h1>{{$title or 'CUỘC SỐNG TẠI EASY CREDIT'}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @foreach($breadcrumbs as $key => $value)
                        @if($value["link"] )
                            <li class="breadcrumb-item">
                                <a  href="{!! $value["link"] !!}" title="{!! $value["name"] !!}">{!! $value["name"] !!}</a>
                            </li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page">{{ summary($value["name"],55) }}</li>
                        @endif
                    @endforeach
                </ol>
            </nav>
        </div>
    </section>
@endif