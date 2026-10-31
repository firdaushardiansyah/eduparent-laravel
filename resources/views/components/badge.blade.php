@props([
    'variant' => 'primary',
    'soft' => false,
    'pill' => false,
])

@php
    $baseClass = 'badge';
    $colorClass = $soft ? "badge-soft-{$variant}" : "bg-{$variant}";
    $pillClass = $pill ? 'rounded-pill' : '';
    $classes = trim("$baseClass $colorClass $pillClass");
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
