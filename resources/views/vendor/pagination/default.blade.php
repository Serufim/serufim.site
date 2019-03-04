@if ($paginator->hasPages())
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="is-disabled pagination-previous">Previous</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="disabled pagination-previous">Previous</a>
        @endif


        <ul class="pagination-list" role="navigation">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li aria-disabled="true"><a class="is-disabled pagination-link"
                                                aria-label="Goto page 1">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="pagination-link is-current" aria-label="Goto page {{ $page }}">{{ $page }}</a>
                            </li>
                        @else
                            <li><a href="{{ $url }}" class="pagination-link"
                                   aria-label="Goto page {{ $page }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next">Next page</a>
        @else
            <a class="is-disabled pagination-next">Next page</a>
@endif
@endif
