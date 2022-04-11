@php($errorName = str_replace(['][', '[', ']'], ['.', '.', ''], $name))
<div class="form-group @error($errorName) has-error @enderror">
    <label class="{{ $colLabel ?? 'col-sm-4' }} control-label float-left font-weight-bold text-center">
        @if(isset($required) && $required === true)
            <span style="color:red">＊</span>
        @endif
        <span id="{{$name}}_label" class="align-text-center">{{ $label }}</span>
    </label>
    <div class="{{ $colInput ?? 'col-sm-6' }} float-left">
        {{ $slot }}
        @error($errorName)<span class="form-text m-b-none text-danger {{ isset($notShowText) ? 'hidden' : '' }}">{{$message}}</span>@enderror
    </div>
    @if(isset($textRight)) <label class="{{ $colRight ?? 'col-sm-2' }} control-label float-left pt-2 text-right-custom">{!! $textRight !!}</label> @endif
</div>
