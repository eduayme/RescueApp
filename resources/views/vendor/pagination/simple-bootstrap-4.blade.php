<!-- Simple previous and next page link : OPEN -->
@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        <!-- Previous Page Link : OPEN -->
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">@lang('pagination.previous')</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
            </li>
        @endif
        <!-- Previous Page Link : CLOSE -->
        <!-- Next Page Link : OPEN -->
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">@lang('pagination.next')</span>
            </li>
        @endif
        <!-- Next Page Link : CLOSE -->
    </ul>
@endif
<!-- Simple previous and next page link : CLOSE -->
