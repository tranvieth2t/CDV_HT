@php($errorName = str_replace(['][', '[', ']'], ['.', '.', ''], $name))
<div class="form-group @error($errorName) has-error @enderror">
    <label class="{{ $colLabel ?? 'col-sm-4' }} control-label float-left font-weight-bold text-right pt-2">
        @if(isset($required) && $required === true)
            <span style="color:red">＊</span>
        @endif
        <span id="{{$name}}_label">{{ $label }}</span>
    </label>
    <div class="{{ $colInput ?? 'col-sm-6' }} float-left">
        {{ $slot }}
        @error($errorName)<span class="form-text m-b-none text-danger">{{$message}}</span>@enderror
    </div>
</div>
