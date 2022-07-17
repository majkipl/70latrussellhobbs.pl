@props([
    'name',
    'max' => false,
    'placeholder' => '',
    'required' => false
    ])

<div {{ $attributes->merge(['class' => 'col-12 col-lg-10 offset-lg-1 field']) }}>
    <textarea class="textarea"
              name="{{ $name }}"
              id="{{ $name }}"
              {{ $required ? 'required' : '' }}
              maxlength="{{ $max }}"
              aria-label="{{ $placeholder }}">{{ $slot }}</textarea>
    <div class="placeholder">{{ $placeholder }}*</div>
    <div class="error-post error-{{ $name }}"></div>
</div>
