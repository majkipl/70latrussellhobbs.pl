@props([
    'name',
    'value' => '',
    ])

<div {{ $attributes->merge(['class' => 'field']) }}>
    <input class="input"
           type="hidden"
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{ $value }}">
    <div class="error-post error-{{ $name }}"></div>
</div>


