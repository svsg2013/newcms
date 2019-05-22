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