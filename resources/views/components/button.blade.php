@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => null,
    'icon' => null,
    'iconPosition' => 'left',
    'href' => null,
    'outline' => false
])

@php
    $btnClass = 'btn';
    $colorClass = $outline ? 'btn-outline-' . $variant : 'btn-' . $variant;
    $sizeClass = $size ? 'btn-' . $size : '';
    $classes = trim("$btnClass $colorClass $sizeClass");
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon && $iconPosition === 'left')
            <i class="{{ $icon }} me-1"></i>
        @endif
        {{ $slot }}
        @if($icon && $iconPosition === 'right')
            <i class="{{ $icon }} ms-1"></i>
        @endif
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon && $iconPosition === 'left')
            <i class="{{ $icon }} me-1"></i>
        @endif
        {{ $slot }}
        @if($icon && $iconPosition === 'right')
            <i class="{{ $icon }} ms-1"></i>
        @endif
    </button>
@endif
