@props(['links' => []])

@if (!empty($links))
<nav aria-label="Breadcrumb">
    <ol class="flex flex-wrap items-center space-x-2 pl-0 md:pl-8">
        @foreach ($links as $label => $url)
        <li class="flex items-center">
            @if (!$loop->last && $url)
            <a href="{{ $url }}"
                class="px-2 py-1 text-gray-600 hover:text-indigo-600 rounded-md transition-all duration-200 font-medium">
                {{ $label }}
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-gray-400 mx-1 flex-shrink-0" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            @else
            <span class="px-2 py-1 text-indigo-600 rounded-md transition-all duration-200 font-semibold">
                {{ $label }}
            </span>
            @endif
        </li>
        @endforeach
    </ol>
</nav>
@endif
