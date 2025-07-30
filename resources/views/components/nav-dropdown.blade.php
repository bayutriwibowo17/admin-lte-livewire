@props(['active' => false, 'icon' => 'tachometer-alt', 'label' => ''])

@php
    $classes = $active ?? false ? 'nav-link active' : 'nav-link';
@endphp

<li class="nav-item {{ $active ? 'menu-is-opening menu-open' : '' }}">
    <a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
        <i class="nav-icon fas fa-{{ $icon }}"></i>
        <p>
            {{ $label }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        {{ $slot }}
    </ul>
</li>
