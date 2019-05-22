@if(!empty($breadcrumbs) && is_array($breadcrumbs) && count($breadcrumbs) > 1)
    <ul class="breadcrumb">
        @foreach($breadcrumbs as $key => $value)
            @if($value["link"] )
                <li>
                    <a href="{!! $value["link"] !!}" title="{!! $value["name"] !!}">{!! $value["name"] !!}</a>
                </li>
            @else
                <li class="active">{!! $value["name"] !!}</li>
            @endif
        @endforeach
    </ul>
@endif