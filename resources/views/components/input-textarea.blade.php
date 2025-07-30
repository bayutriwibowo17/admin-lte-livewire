@php
    $classes = $errors->has($name) ? 'is-invalid' : '';
@endphp

<textarea {{ $attributes->merge([
    'class' => 'form-control ' . $classes,
]) }} rows="5"></textarea>
