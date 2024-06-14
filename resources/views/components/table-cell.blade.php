@props(['value'])

<td {{ $attributes->merge(['class' => 'px-6 py-4 text-sm whitespace-nowrap text-gray-700 border border-gray-400']) }}>
    <div class="max-w-72 break-words whitespace-normal">
        <span>{{ $value ?? $slot }}</span>
    </div>
    
</td>