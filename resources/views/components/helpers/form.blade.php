<form
    id="{{ $id }}"
    name="{{ $name }}"
    method="{{ $method }}"
    action="{{ $action }}"
    {{ $enctypeFormAttribute() }}
>
    @csrf
    
    @if ($spoofedType ?? false)
        @method($spoofedType)
    @endif

    <div class="space-y-3">
        {{ $slot }}
    </div>
</form>