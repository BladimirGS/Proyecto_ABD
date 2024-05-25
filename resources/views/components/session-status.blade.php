@props(['status'])

@if ($status)
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center font-bold" id="alert">
        <span class="block sm:inline">{{ session('status') }}</span>
    </div>
@endif
