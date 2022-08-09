<div class="w3-center ">
    <div class="w3-bar">

        @if ($paginator->hasPages())
        <nav>
            <div class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <div class="page-item disabled w3-bar-item " aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <label class="page-link" aria-hidden="true">&lsaquo;</label>
                </div>
                @else
                <div class="page-item w3-bar-item  ">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </div>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <div class="page-item disabled w3-bar-item  " aria-disabled="true"><label class="page-link">{{ $element }}</label></div>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <div class="page-item activetor w3-bar-item  " aria-current="page"><label class="page-link">{{ $page }}</label></div>
                @else
                <div class="page-item w3-bar-item "><a class="page-link" href="{{ $url }}">{{ $page }}</a></div>
                @endif
                @endforeach
                @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <div class="page-item w3-bar-item  ">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </div>
                @else
                <div class="page-item disabled w3-bar-item " aria-disabled="true" aria-label="@lang('pagination.next')">
                    <label class="page-link" aria-hidden="true">&rsaquo;</label>
                </div>
                @endif
            </div>
        </nav>
        @endif
    </div>
</div>