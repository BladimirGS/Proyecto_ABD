@props(['type' => 'text', 'autocomplete' => 'off', 'disabled' => false])

<input 
    type="{{ $type }}" 
    autocomplete="{{ $autocomplete }}" 
    {{ $disabled ? 'disabled' : '' }} 
    {!! $attributes->merge(['class' => 'block w-full h-10 mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}
>
