@error($name)
    <small class="error text-danger">
        {{ $message }}
    </small>
@else
    <small class="text-muted">
        {{ $slot }}
    </small>
@enderror
