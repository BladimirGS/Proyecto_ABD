@props(['color' => 'default', 'href' => '#'])

@php
    $class = '';

    switch ($color) {
        case 'green':
            $class = 'bg-green-600 hover:bg-green-700 focus:bg-green-500 active:bg-green-800';
            break;
        case 'blue':
            $class = 'bg-blue-600 hover:bg-blue-700 focus:bg-blue-500 active:bg-blue-800';
            break;
        case 'amber':
            $class = 'bg-amber-500 hover:bg-amber-600 focus:bg-amber-500 active:bg-amber-700';
            break;
        case 'red':
            $class = 'bg-red-600 hover:bg-red-700 focus:bg-red-500 active:bg-red-800';
            break;
        default:
            $class = 'bg-[#1e355e] hover:bg-[#1a2e52] focus:bg-[#17294a] active:bg-[#14233f]';
            break;
    }
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'px-4 py-2 text-center text-white rounded-md font-semibold text-xs uppercase tracking-widest border border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-200 ' . $class]) }}>
    {{ $slot }}
</a>
