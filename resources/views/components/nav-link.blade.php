@props(['active'])

@php
$classes = ($active ?? false)
            ? 'relative text-white transition-all hover:text-white grid grid-cols-[max-content,max-content] items-center gap-x-4 py-3 xl:py-4 pl-6 before:content-[""] before:absolute before:left-0 before:w-0.5 before:h-8 before:bg-white'
            : 'relative text-violet-300 transition-all hover:text-white grid grid-cols-[max-content,max-content] items-center gap-x-4 py-3 xl:py-4 pl-6';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
