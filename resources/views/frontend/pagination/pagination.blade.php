@if ($paginator->hasPages())

    <div class="row">
        <nav class="pagination-wrap">
            <ul class="pagination d-flex justify-content-center gap-md-3 gap-2">
                @if ($paginator->onFirstPage())
                    <li class="page-item" style="cursor: pointer">
                        <a class="page-link" tabindex="-1">Prev</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1">Prev</a>
                    </li>
                @endif

                @for ($i = 1; $i < $paginator->lastPage(); $i++)
                    
                    <li class="page-item @if($i == $paginator->currentPage()) active @endif "><a class="page-link" href="{{ $paginator->url($i) }}">0{{ $i }}</a></li>

                    @if($i == 5)
                        @break;
                    @endif

                @endfor
                <li class="page-item"><a class="page-link" href="">...</a></li>

                <li class="page-item @if($paginator->lastPage() == $paginator->currentPage()) active @endif "><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">0{{ $paginator->lastPage() }}</a></li>
               
                @if($paginator->lastPage() == $paginator->currentPage())
                <li class="page-item" style="cursor: pointer">
                    <a class="page-link">Next</a>
                </li>
                @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a>
                </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
