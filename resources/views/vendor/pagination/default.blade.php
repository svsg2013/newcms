@if ($paginator->hasPages())
    <ul>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled first"><a href="#"><span>First</span></a></li>
        @else
            <li  class="first"><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><span>First</span></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a class="active" title="{{ $page }}"><span>{{ $page }}</span></a></li>
                    @else
                        <li><a href="{{ $url }}"><span>{{ $page }}</span></a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="last"><a href="{{ $paginator->nextPageUrl() }}" rel="next"><span>Last</span></a></li>
        @else
            <li class="disabled last">
                <a href="#"><span>Last</span></a>
            </li>
        @endif
    </ul>
@endif
