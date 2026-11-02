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
    $btnClass = 'btn d-inline-flex align-items-center justify-content-center';
    $colorClass = $outline ? 'btn-outline-' . $variant : 'btn-' . $variant;
    $sizeClass = $size ? 'btn-' . $size : '';
    $classes = trim("$btnClass $colorClass $sizeClass");
@endphp

@if ($href)
    <a href="{{ $href }}" style="min-height: 44px; min-width: 44px;" {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon && $iconPosition === 'left')
            <i class="{{ $icon }} me-2"></i>
        @endif
        {{ $slot }}
        @if ($icon && $iconPosition === 'right')
            <i class="{{ $icon }} ms-2"></i>
        @endif
    </a>
@else
    <button type="{{ $type }}" style="min-height: 44px; min-width: 44px;" {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon && $iconPosition === 'left')
            <i class="{{ $icon }} me-2"></i>
        @endif
        {{ $slot }}
        @if ($icon && $iconPosition === 'right')
            <i class="{{ $icon }} ms-2"></i>
        @endif
    </button>
@endif
