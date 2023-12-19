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

    {{ $slot }}
</form>