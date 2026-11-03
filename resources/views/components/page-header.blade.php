@props([
    'title' => '',
    'subtitle' => null,
    'breadcrumbs' => [],
])

<div {{ $attributes->merge(['class' => 'd-flex align-items-sm-center justify-content-between flex-column flex-sm-row row-gap-2 mb-4']) }}>
    <div>
        @if (!empty($breadcrumbs))
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-divide p-0 mb-1">
                    <li class="breadcrumb-item d-flex align-items-center">
                        <a href="{{ route('dashboard') }}" class="text-decoration-none">
                            <i class="ti ti-home fs-14 me-1"></i>Beranda
                        </a>
                    </li>
                    @foreach ($breadcrumbs as $label => $url)
                        @if ($loop->last)
                            <li class="breadcrumb-item active fw-medium" aria-current="page">{{ is_array($url) ? ($url['label'] ?? $label) : $label }}</li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ is_array($url) ? ($url['url'] ?? '#') : $url }}" class="text-decoration-none">{{ is_array($url) ? ($url['label'] ?? $label) : $label }}</a></li>
                        @endif
                    @endforeach
                </ol>
            </nav>
        @endif

        <h4 class="fw-bold mb-0 text-dark">{{ $title }}</h4>
        @if ($subtitle)
            <p class="text-muted fs-13 mb-0">{{ $subtitle }}</p>
        @endif
    </div>

    @if (isset($actions) || $slot->isNotEmpty())
        <div class="d-flex align-items-center gap-2 flex-wrap">
            {{ $actions ?? $slot }}
        </div>
    @endif
</div>

