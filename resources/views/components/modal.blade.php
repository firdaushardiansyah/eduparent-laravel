@props([
    'id' => 'customModal',
    'title' => null,
    'size' => '',
    'centered' => true,
    'scrollable' => false,
    'actions' => null
])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true" {{ $attributes }}>
    <div class="modal-dialog {{ $size ? 'modal-' . $size : '' }} {{ $centered ? 'modal-dialog-centered' : '' }} {{ $scrollable ? 'modal-dialog-scrollable' : '' }}">
        <div class="modal-content">
            @if($title || isset($header))
                <div class="modal-header">
                    @if(isset($header))
                        {{ $header }}
                    @else
                        <h5 class="modal-title" id="{{ $id }}Label">{{ $title }}</h5>
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            @endif

            <div class="modal-body">
                {{ $slot }}
            </div>

            @if($actions || isset($footer))
                <div class="modal-footer">
                    @if(isset($footer))
                        {{ $footer }}
                    @else
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        {{ $actions }}
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
