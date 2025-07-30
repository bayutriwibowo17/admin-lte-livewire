@props(['active' => false, 'icon' => 'tachometer-alt', 'dropdown' => false])

@php
    $classes = $active ?? false ? 'nav-link active' : 'nav-link';
@endphp

@props(['active' => false, 'icon' => 'tachometer-alt', 'dropdown' => false])

@php
    $classes = $active ?? false ? 'nav-link active' : 'nav-link';
@endphp

@if ($dropdown)
    <li class="nav-item">
        <a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
            <i class="nav-icon far fa-circle"></i>
            <p>{{ $slot }}</p>
        </a>
    </li>
@else
    <li class="nav-item">
        <a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
            <i class="nav-icon fas fa-{{ $icon }}"></i>
            <p>{{ $slot }}</p>
        </a>
    </li>
@endif
