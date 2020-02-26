<!-- This code renders the default layout of laravel pagination : OPEN -->
@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        <!-- Previous Page Link : OPEN -->
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif
        <!-- Previous Page Link : CLOSE -->

        <!-- Pagination Elements : OPEN -->
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator : OPEN -->
            @if (is_string($element))
                <li class="disabled" aria-disabled="true">
                    <span>{{ $element }}</span>
                </li>
            @endif
            <!-- "Three Dots" Separator : CLOSE -->

            <!-- Array Of Links : OPEN -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page">
                            <span>{{ $page }}</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
            <!-- Array Of Links : CLOSE -->
        @endforeach
        <!-- Pagination Elements : CLOSE -->

        <!-- Next Page Link : OPEN-->
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
        <!-- Next Page Link : CLOSE-->
    </ul>
@endif
<!-- This code renders the default layout of laravel pagination : CLOSE -->
