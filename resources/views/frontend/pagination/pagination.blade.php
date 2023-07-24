@if ($paginator->hasPages())
    <div class="row">
        <nav class="pagination-wrap">
            <ul class="pagination d-flex justify-content-center gap-md-3 gap-2">

                @if ($paginator->onFirstPage())
                    <li class="page-item">
                        <span class="page-link">&lsaquo;</span>
                    </li>
                @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1">Prev</a>
                </li>
                @endif
                {{-- <li class="page-item"><a class="page-link" href="#">01</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">02</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">03</a></li> --}}

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item"><a class="page-link" href="#">{{ $element }}</li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item"><a class="page-link" href="#">{{ $page }}</li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $url }}">{{ $page }}</li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
@endif
