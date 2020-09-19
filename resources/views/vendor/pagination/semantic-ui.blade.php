<!-- This code renders the semantic iu pagination : OPEN -->
@if ($paginator->hasPages())
    <div class="ui pagination menu" role="navigation">
        <!-- Previous Page Link : OPEN -->
        @if ($paginator->onFirstPage())
            <a class="icon item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <i class="left chevron icon"></i>
            </a>
        @else
            <a class="icon item" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                <i class="left chevron icon"></i>
            </a>
        @endif
        <!-- Previous Page Link : CLOSE -->
        <!-- Pagination Elements : OPEN -->
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator : OPEN -->
            @if (is_string($element))
                <a class="icon item disabled" aria-disabled="true">{{ $element }}</a>
            @endif
            <!-- "Three Dots" Separator : CLOSE -->
            <!-- Array Of Links  : OPEN -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="item active" href="{{ $url }}" aria-current="page">{{ $page }}</a>
                    @else
                        <a class="item" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
            <!-- Array Of Links  : CLOSE -->
        @endforeach
        <!-- Pagination Elements : CLOSE -->

        <!-- Next Page Link : OPEN -->
        @if ($paginator->hasMorePages())
            <a class="icon item" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                <i class="right chevron icon"></i>
            </a>
        @else
            <a class="icon item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <i class="right chevron icon"></i>
            </a>
        @endif
        <!-- Next Page Link : CLOSE -->
    </div>
@endif
<!-- This code renders the semantic iu pagination : CLOSE -->
