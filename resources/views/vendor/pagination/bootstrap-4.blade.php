@if ($paginator->hasPages())
<ul class="pagination pagination-rounded justify-content-center mt-4">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a href="#" class="page-link" aria-hidden="true"><i class="mdi mdi-chevron-left"></i></a>
        </li>
    @else
        <li class="page-item">
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev" aria-label="@lang('pagination.previous')"><i class="mdi mdi-chevron-left"></i></a>
        </li>
    @endif
    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
        @endif
        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page === $paginator->currentPage())
                    <li class="page-item active" aria-current="page">
                        <a href="#" class="page-link">{{ $page }}</a>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next" aria-label="@lang('pagination.next')"><i class="mdi mdi-chevron-right"></i></a>
        </li>
    @else
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <a class="page-link" aria-hidden="true"><i class="mdi mdi-chevron-right"></i></a>
        </li>
    @endif
</ul>
@endif
