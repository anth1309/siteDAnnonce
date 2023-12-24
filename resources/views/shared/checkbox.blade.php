@php

    $class ??= null;
@endphp

<div @class(['form-check form-switch', $class])>
    <input type="hidden" value="1" name="{{ $name }}">
    <input @checked(old($name, $value ?? false)) type="checkbox" class="form-check-input" name="{{ $name }}" value="1"
        @error($name) is-invalid @enderror role="switch" id="{{ $name }}">
    <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>
