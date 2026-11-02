@props([
    'cardView' => false,
    'wrapperClass' => '',
])

<div {{ $attributes->merge(['class' => 'table-responsive ' . ($cardView ? 'table-card-view-wrapper ' : '') . $wrapperClass]) }}>
    @if (!Str::contains((string) $slot, '<table'))
        <table class="table align-middle table-hover {{ $cardView ? 'table-card-view' : '' }}">
            {{ $slot }}
        </table>
    @else
        {{ $slot }}
    @endif
</div>

