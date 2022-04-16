@php($errorName = str_replace(['][', '[', ']'], ['.', '.', ''], $name))
<div class="form-group mb-0 row py-1 @error($errorName) has-error @enderror">
    <label class="{{ $colLabel ?? 'col-sm-2' }} control-label  my-0  font-weight-bold ">
        @if(isset($required) && $required === true)
            <span style="color:red">＊</span>
        @endif
        <span id="{{$name}}_label">{{ $label }}</span>
    </label>
    <div class="{{ $colInput ?? 'col-sm-6' }} ">
        {{ $slot }}
        @error($errorName)<span class="form-text m-b-none text-danger {{ isset($notShowText) ? 'hidden' : '' }}">{{$message}}</span>@enderror
    </div>
    @if(isset($textRight)) <label class="{{ $colRight ?? 'col-sm-2' }} control-label text-right-custom">{!! $textRight !!}</label> @endif
</div>
