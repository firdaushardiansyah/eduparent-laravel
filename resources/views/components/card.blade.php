@props([
    'title' => null,
    'subtitle' => null,
    'actions' => null,
    'headerClass' => '',
    'bodyClass' => '',
    'footer' => null,
    'footerClass' => ''
])

<div {{ $attributes->merge(['class' => 'card']) }}>
    @if($title || $actions || isset($header))
        <div class="card-header d-flex align-items-center justify-content-between {{ $headerClass }}">
            @if(isset($header))
                {{ $header }}
            @else
                <div>
                    <h5 class="card-title mb-0">{{ $title }}</h5>
                    @if($subtitle)
                        <p class="text-muted fs-12 mb-0">{{ $subtitle }}</p>
                    @endif
                </div>
                @if($actions || isset($headerActions))
                    <div class="card-actions">
                        {{ $headerActions ?? $actions }}
                    </div>
                @endif
            @endif
        </div>
    @endif

    <div class="card-body {{ $bodyClass }}">
        {{ $slot }}
    </div>

    @if($footer || isset($footerSlot))
        <div class="card-footer {{ $footerClass }}">
            {{ $footerSlot ?? $footer }}
        </div>
    @endif
</div>
