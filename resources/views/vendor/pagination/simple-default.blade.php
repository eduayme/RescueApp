<!-- Pagination with Previous and Next Page Link Only : OPEN -->
@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        <!-- Previous Page Link : OPEN -->
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true">
                <span>@lang('pagination.previous')</span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    @lang('pagination.previous')
                </a>
            </li>
        @endif
        <!-- Previous Page Link : CLOSE -->

        <!-- Next Page Link : OPEN -->
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                    @lang('pagination.next')
                </a>
            </li>
        @else
            <li class="disabled" aria-disabled="true">
                <span>@lang('pagination.next')</span>
            </li>
        @endif
        <!-- Next Page Link : CLOSE -->
    </ul>
@endif
<!-- Pagination with Previous and Next Page Link Only : CLOSE -->
