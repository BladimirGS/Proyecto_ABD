@props(['autocomplete' => 'off', 'disabled' => false])

<textarea 
    autocomplete="{{ $autocomplete }}" 
    {{ $disabled ? 'disabled' : '' }} 
    {!! $attributes->merge(['class' => 'block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}
>{{ $slot }}</textarea>
