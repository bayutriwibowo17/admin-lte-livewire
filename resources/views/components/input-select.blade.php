@php
    $classes = $errors->has($name) ? 'is-invalid' : '';
@endphp

<select {{ $attributes->merge(['class' => 'form-control ' . $classes]) }}>
    {{ $slot }}
</select>
