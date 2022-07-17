@props([
    'name',
    'required' => false
    ])

<div {{ $attributes->merge(['class' => 'col-12 col-lg-10 offset-lg-1 field']) }}>
    <input class="checkbox"
           type="checkbox"
           name="{{ $name }}"
           id="{{ $name }}"
        {{ $required ? 'required' : '' }}
    />
    <label for="{{ $name }}" class="label-checkbox">
        <span>{{ $required ? '*' : '' }}{{ $slot }}</span>
    </label>
    <div class="error-post error-{{ $name }}"></div>
</div>
