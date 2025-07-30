@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        {{-- Mobile Pagination --}}
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-400 bg-white border border-gray-200 cursor-default leading-4 rounded-lg">
                    <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Sebelumnya
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-700 bg-white border border-gray-200 leading-4 rounded-lg hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200">
                    <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Sebelumnya
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-3 py-1.5 ml-2 text-xs font-medium text-gray-700 bg-white border border-gray-200 leading-4 rounded-lg hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200">
                    Selanjutnya
                    <svg class="w-3 h-3 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            @else
                <span class="relative inline-flex items-center px-3 py-1.5 ml-2 text-xs font-medium text-gray-400 bg-white border border-gray-200 cursor-default leading-4 rounded-lg">
                    Selanjutnya
                    <svg class="w-3 h-3 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </span>
            @endif
        </div>

        {{-- Desktop Pagination --}}
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            {{-- Results Info --}}
            <div class="flex items-center space-x-2">
                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 border border-indigo-100 rounded-lg px-3 py-1.5">
                    <p class="text-xs text-gray-700 leading-4">
                        Menampilkan
                        @if ($paginator->firstItem())
                            <span class="font-semibold text-indigo-600">{{ $paginator->firstItem() }}</span>
                            sampai
                            <span class="font-semibold text-indigo-600">{{ $paginator->lastItem() }}</span>
                        @else
                            {{ $paginator->count() }}
                        @endif
                        dari
                        <span class="font-semibold text-indigo-600">{{ $paginator->total() }}</span>
                        hasil
                    </p>
                </div>
            </div>

            {{-- Pagination Links --}}
            <div class="flex items-center gap-1">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center justify-center w-8 h-8 text-xs font-medium text-gray-400 bg-white border border-gray-200 cursor-default rounded-lg">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center justify-center w-8 h-8 text-xs font-medium text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:border-indigo-300 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 transform hover:scale-105">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span class="relative inline-flex items-center justify-center w-8 h-8 text-xs font-medium text-gray-700 bg-white border border-gray-200 cursor-default rounded-lg">{{ $element }}</span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="relative inline-flex items-center justify-center w-8 h-8 text-xs font-semibold text-white bg-gradient-to-r from-indigo-600 to-purple-600 border border-indigo-600 cursor-default rounded-lg shadow-md transform scale-105">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="relative inline-flex items-center justify-center w-8 h-8 text-xs font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:border-indigo-300 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 transform hover:scale-105">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center justify-center w-8 h-8 text-xs font-medium text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:border-indigo-300 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 transform hover:scale-105">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @else
                    <span class="relative inline-flex items-center justify-center w-8 h-8 text-xs font-medium text-gray-400 bg-white border border-gray-200 cursor-default rounded-lg">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </span>
                @endif
            </div>
        </div>
    </nav>
@endif