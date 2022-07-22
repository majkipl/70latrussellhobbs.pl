@props([
    'name',
    'max' => false,
    'placeholder' => '',
    'value' => '',
    'required' => false
    ])

<div {{ $attributes->merge(['class' => 'col-12 col-lg-5 field']) }}>
    <input class="input"
           type="text"
           name="{{ $name }}"
           id="{{ $name }}"
           {{ $required ? 'required' : '' }}
           maxlength="{{ $max }}"
           aria-label="{{ $placeholder }}"
           value="{{ $value }}">
    <div class="placeholder">{{ $placeholder }}{{ $required ? '*' : '' }}</div>
    <div class="error-post error-{{ $name }}"></div>
</div>
