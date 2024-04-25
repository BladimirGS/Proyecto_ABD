@props(['value'])

<th {{ $attributes->merge(['class' => 'px-6 py-3 text-left text-xs font-bold uppercase tracking-wider']) }}>
    {{ $value ?? $slot }}
</th>