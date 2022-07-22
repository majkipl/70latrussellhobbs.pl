@props([
    'name',
    'placeholder' => '',
    'required' => false,
    'items' => [],
    'selected' => 0
    ])

<div {{ $attributes->merge(['class' => 'col-12 col-lg-5 field']) }}>
    <select class="input select"
            name="{{ $name }}"
            id="{{ $name }}"
            aria-label="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}
    >
        <option @if(!$selected) selected @endif></option>
        @foreach($items as $item)
            <option value="{{ $item->id }}" @if($selected == $item->id) selected @endif>{{ $item->name }}</option>
        @endforeach
    </select>
    <div class="placeholder">{{ $placeholder }}{{ $required ? '*' : '' }}</div>
    <div class="error-post error-{{ $name }}"></div>
</div>
