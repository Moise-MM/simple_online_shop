@props(['id' => null, 'name', 'label' => null, 'value' => null, 'placeholder' => ''])

<div class="mb-4">
    @if ($label)
        <label class="form-label" for="{{ $id ?? $name}}">{{ $label }}</label>
    @endif
    <textarea id="{{ $id ?? $name}}" name="{{ $name }}" cols="30" rows="5"
        class="form-control @error($name) is-invalid @enderror"
        placeholder="{{ $placeholder }}">{{ old($name, $value) }}
    </textarea>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
