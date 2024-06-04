@props(['value'])

<td {{ $attributes->merge(['class' => 'px-6 py-4 text-sm whitespace-nowrap font-medium text-gray-700']) }}>
    <div class="max-w-72 break-words whitespace-normal">
        <span class="font-semibold">{{ $value ?? $slot }}</span>
    </div>
    
</td>