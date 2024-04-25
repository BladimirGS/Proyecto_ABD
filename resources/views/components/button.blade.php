@props(['color' => 'primary'])

@php
    $class = '';

    switch ($color) {
        case 'red':
            $class = 'bg-red-600 hover:bg-red-700 focus:bg-red-700 active:bg-red-800';
            break;
        case 'blue':
            $class = 'bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800';
            break;
        case 'primary':
        default:
            $class = 'bg-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900';
            break;
    }
@endphp

<button {{ $attributes->merge(['class' => 'px-4 py-2 text-white rounded-md font-semibold text-xs uppercase tracking-widest border border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150 ' . $class]) }}>
    {{ $slot }}
</button>
