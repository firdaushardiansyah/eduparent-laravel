@props([
    'name',
    'label' => null,
    'type' => 'text',
    'value' => null,
    'placeholder' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'helper' => null,
    'id' => null,
])

@php
    $inputId = $id ?? $name;
    $inputValue = old($name, $value);
@endphp

<div class="mb-3">
    @if ($label)
        <label for="{{ $inputId }}" class="form-label fs-14 fw-medium text-dark mb-1">
            {{ $label }}
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    <input type="{{ $type }}"
           name="{{ $name }}"
           id="{{ $inputId }}"
           value="{{ $inputValue }}"
           @if ($placeholder) placeholder="{{ $placeholder }}" @endif
           @if ($required) required @endif
           @if ($disabled) disabled @endif
           @if ($readonly) readonly @endif
           style="min-height: 44px; font-size: 16px;"
           {{ $attributes->merge(['class' => 'form-control'])->class(['is-invalid' => $errors->has($name)]) }}>

    @if ($helper && !$errors->has($name))
        <div class="form-text fs-12 text-muted">{{ $helper }}</div>
    @endif

    @error($name)
        <div class="invalid-feedback d-block fs-12">
            {{ $message }}
        </div>
    @enderror
</div>

