@props(['color' => 'default'])

@php
    $class = '';

    switch ($color) {
        case 'red':
            $class = 'bg-red-600 hover:bg-red-700 focus:bg-red-500 active:bg-red-800';
            break;
        case 'green':
            $class = 'bg-green-600 hover:bg-green-700 focus:bg-green-500 active:bg-green-800';
            break;
        case 'blue':
            $class = 'bg-blue-600 hover:bg-blue-700 focus:bg-blue-500 active:bg-blue-800';
            break;
        case 'violet':
            $class = 'bg-violet-600 hover:bg-violet-700 focus:bg-violet-500 active:bg-violet-800';
            break;
        case 'gray':
            $class = 'bg-gray-500 hover:bg-gray-600 focus:bg-gray-500 active:bg-gray-700';
            break;
        case 'amber':
            $class = 'bg-amber-500 hover:bg-amber-600 focus:bg-amber-400 active:bg-amber-700';
            break;
        case 'ito':
            $class = 'bg-[#1e355e] hover:bg-[#f7811e] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#f7811e]';
            break;
        default:
            $class = 'bg-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900';
            break;
    }
@endphp

<button {{ $attributes->merge(['class' => trim('px-4 py-2 text-center text-white rounded-md font-semibold text-xs uppercase tracking-widest border border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-200 ' . $class)]) }}>
    {{ $slot }}
</button>
