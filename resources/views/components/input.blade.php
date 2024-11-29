@props(['id' => null, 'name', 'label' => null, 'type' => 'text', 'value' => '', 'placeholder' => '',  'required' => false])

<div class="mb-3">
    @if ($label)
        <label class="form-label" for="{{ $id ?? $name }}">{{ $label }}</label>
    @endif
    <input id="{{ $id ?? $name }}" type="{{ $type }}" name="{{ $name }}" value="{{ $value }}"
        class="form-control @error($name) is-invalid @enderror"
        placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}/>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
