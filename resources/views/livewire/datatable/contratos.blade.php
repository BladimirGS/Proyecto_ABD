<div>
    @forelse ($usuario->contratos as $contrato)
        <span class="block">{{ $contrato->nombre }}</span>
    @empty
        <span>Sin contrato</span>
    @endforelse
</div>
