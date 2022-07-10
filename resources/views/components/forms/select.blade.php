@props([
    'name',
    'placeholder' => '',
    'required' => false,
    'items' => []
    ])

<div {{ $attributes->merge(['class' => 'col-12 col-lg-5 field']) }}>
    <select class="input select empty"
            name="{{ $name }}"
            id="{{ $name }}"
            aria-label="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}
    >
        <option selected></option>
        @foreach($items as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    <div class="placeholder">{{ $placeholder }}{{ $required ? '*' : '' }}</div>
    <div class="error-post error-{{ $name }}"></div>
</div>
