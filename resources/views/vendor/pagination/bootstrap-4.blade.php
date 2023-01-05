@if ($paginator->hasPages())
    <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">
    <!--Pagina anterior-->
    @if ($paginator->onFirstPage())
        @else
        <a class="pagination-previous button is-primary" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Anterior</a>
    @endif
    <!--Pagina siguiente-->
    @if ($paginator->hasMorePages())
        <a class="pagination-next button is-primary" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Siguiente</a>
    @endif

        <ul class="pagination-list">
           

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="pagination-ellipsis">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination-link is-current" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="pagination-link"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            
        </ul>
       
    
    </nav>
@endif
