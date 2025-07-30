@php
    $classes = $errors->has($name) ? 'is-invalid' : '';
@endphp
<input {{ $attributes->merge([
    'class' => 'form-control ' . $classes,
]) }} />
