@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center space-x-1 text-sm">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-2 rounded-lg bg-gray-100 text-gray-400 cursor-not-allowed">&laquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}{{ http_build_query(request()->except('page')) ? '&' . http_build_query(request()->except('page')) : '' }}"
               class="px-3 py-2 rounded-lg bg-white border border-gray-300 text-gray-600 hover:bg-gray-100 transition">&laquo;</a>
        @endif

        {{-- Pages --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-3 py-2 text-gray-400">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @php
                        $queryString = http_build_query(request()->except('page'));
                        $finalUrl = $url . ($queryString ? '&' . $queryString : '');
                    @endphp

                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-2 rounded-lg bg-gray-900 text-white font-semibold shadow-sm">{{ $page }}</span>
                    @else
                        <a href="{{ $finalUrl }}"
                           class="px-3 py-2 rounded-lg bg-white border border-gray-300 text-gray-700 hover:bg-gray-100 transition">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}{{ http_build_query(request()->except('page')) ? '&' . http_build_query(request()->except('page')) : '' }}"
               class="px-3 py-2 rounded-lg bg-white border border-gray-300 text-gray-600 hover:bg-gray-100 transition">&raquo;</a>
        @else
            <span class="px-3 py-2 rounded-lg bg-gray-100 text-gray-400 cursor-not-allowed">&raquo;</span>
        @endif

    </nav>
@endif
