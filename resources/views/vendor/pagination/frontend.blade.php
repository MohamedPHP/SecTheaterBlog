@if ($paginator->hasPages())
    <div class="pagination">

        @if ($paginator->onFirstPage())
            <a class="pagination__prev disabled" href="#" title="Previous Page">&laquo;</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination__prev disabled" href="#" title="@lang('pagination.previous')">&laquo;</a>
        @endif

        <ol>
            @foreach ($paginator as $element)

                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true">
                        <a href="#">{{ $element }}</a>
                    </li>
                @endif


                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination__current">{{ $page }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ol>
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination__next" title="@lang('pagination.next')">&raquo;</a>
        @else
            <a href="{{ $paginator->nextPageUrl() }}" class="disabled pagination__next" title="@lang('pagination.next')">&raquo;</a>
        @endif


    </div>
@endif
