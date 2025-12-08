@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center">
            {{-- Primeira página --}}
            @if (!$paginator->onFirstPage())
                <li class="page-item">
                    <a class="page-link rounded-circle" href="{{ $paginator->url(1) }}" rel="first">
                        &laquo;
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link rounded-circle" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        &lsaquo;
                    </a>
                </li>
            @else
                <li class="page-item disabled"><span class="page-link rounded-circle">&laquo;</span></li>
                <li class="page-item disabled"><span class="page-link rounded-circle">&lsaquo;</span></li>
            @endif

            {{-- Números --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Última página --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link rounded-circle" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        &rsaquo;
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link rounded-circle" href="{{ $paginator->url($paginator->lastPage()) }}" rel="last">
                        &raquo;
                    </a>
                </li>
            @else
                <li class="page-item disabled"><span class="page-link rounded-circle">&rsaquo;</span></li>
                <li class="page-item disabled"><span class="page-link rounded-circle">&raquo;</span></li>
            @endif
        </ul>
    </nav>
@endif
