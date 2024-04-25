@props(['value'])

<td {{ $attributes->merge(['class' => 'px-6 py-4 text-sm whitespace-nowrap font-medium text-gray-700']) }}>
    {{ $value ?? $slot }}
</td>