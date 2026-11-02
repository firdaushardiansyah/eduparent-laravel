@props([
    'name',
    'label' => null,
    'value' => null,
    'rows' => 3,
    'placeholder' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'helper' => null,
    'id' => null,
])

@php
    $textareaId = $id ?? $name;
    $textareaValue = old($name, $value ?? (string) $slot);
@endphp

<div class="mb-3">
    @if ($label)
        <label for="{{ $textareaId }}" class="form-label fs-14 fw-medium text-dark mb-1">
            {{ $label }}
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    <textarea name="{{ $name }}"
              id="{{ $textareaId }}"
              rows="{{ $rows }}"
              @if ($placeholder) placeholder="{{ $placeholder }}" @endif
              @if ($required) required @endif
              @if ($disabled) disabled @endif
              @if ($readonly) readonly @endif
              style="min-height: 44px; font-size: 16px;"
              {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}>{{ $textareaValue }}</textarea>

    @if ($helper && !$errors->has($name))
        <div class="form-text fs-12 text-muted">{{ $helper }}</div>
    @endif

    @error($name)
        <div class="invalid-feedback d-block fs-12">
            {{ $message }}
        </div>
    @enderror
</div>

