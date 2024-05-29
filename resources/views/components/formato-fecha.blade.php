@props(['slot'])

@php
    // Convertimos la fecha proporcionada en un objeto de fecha
    $fechaformateada = \Carbon\Carbon::parse($slot)->format('d/m/Y');
@endphp

<span>{{ $fechaformateada }}</span>
