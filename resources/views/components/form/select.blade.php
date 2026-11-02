@props([
    'name',
    'label' => null,
    'options' => [],
    'placeholder' => '-- Pilih Opsi --',
    'selected' => null,
    'required' => false,
    'disabled' => false,
    'helper' => null,
    'id' => null,
])

@php
    $selectId = $id ?? $name;
    $selectedValue = old($name, $selected);
@endphp

<div class="mb-3">
    @if ($label)
        <label for="{{ $selectId }}" class="form-label fs-14 fw-medium text-dark mb-1">
            {{ $label }}
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    <select name="{{ $name }}"
            id="{{ $selectId }}"
            @if ($required) required @endif
            @if ($disabled) disabled @endif
            style="min-height: 44px; font-size: 16px;"
            {{ $attributes->class(['form-select', 'is-invalid' => $errors->has($name)]) }}>
        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif

        @if (!empty($options))
            @foreach ($options as $val => $optLabel)
                <option value="{{ $val }}" {{ (string) $selectedValue === (string) $val ? 'selected' : '' }}>
                    {{ $optLabel }}
                </option>
            @endforeach
        @else
            {{ $slot }}
        @endif
    </select>

    @if ($helper && !$errors->has($name))
        <div class="form-text fs-12 text-muted">{{ $helper }}</div>
    @endif

    @error($name)
        <div class="invalid-feedback d-block fs-12">
            {{ $message }}
        </div>
    @enderror
</div>

