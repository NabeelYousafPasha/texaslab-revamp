<form
    id="{{ $id }}"
    name="{{ $name }}"
    method="{{ $method }}"
    action="{{ $action }}"
    {{ $enctypeFormAttribute() }}
>   
    @if ($spoofedType ?? false)
        @method($spoofedType)
    @endif

    <div class="space-y-3">
        {{ $slot }}

        @csrf
    </div>
</form>