@props(['active'])

@php
$classes = ($active ?? false)
    ? 'w-full flex items-center p-3 text-indigo-600 font-semibold hover:bg-white hover:shadow-md rounded-lg
    transition-all duration-200'
    : 'w-full flex items-center p-3 text-gray-700 hover:text-indigo-600 hover:bg-white hover:shadow-md rounded-lg
    transition-all duration-200';
@endphp

<li class="relative">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>