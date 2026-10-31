@props([
    'title' => '',
    'value' => '',
    'icon' => 'ti ti-users',
    'iconBg' => 'bg-soft-primary text-primary',
    'badgeText' => null,
    'badgeVariant' => 'success',
    'badgeIcon' => null,
    'subtext' => null
])

<div {{ $attributes->merge(['class' => 'card']) }}>
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <p class="text-muted mb-1 fs-13">{{ $title }}</p>
                <h3 class="mb-0 fw-bold">{{ $value }}</h3>
            </div>
            <div class="avatar avatar-md rounded-circle {{ $iconBg }} d-flex align-items-center justify-content-center">
                <i class="{{ $icon }} fs-20"></i>
            </div>
        </div>

        @if($badgeText || $subtext)
            <div class="d-flex align-items-center gap-1 fs-12">
                @if($badgeText)
                    <span class="badge badge-soft-{{ $badgeVariant }} d-inline-flex align-items-center gap-1">
                        @if($badgeIcon)
                            <i class="{{ $badgeIcon }}"></i>
                        @endif
                        {{ $badgeText }}
                    </span>
                @endif
                @if($subtext)
                    <span class="text-muted">{{ $subtext }}</span>
                @endif
            </div>
        @endif
    </div>
</div>
