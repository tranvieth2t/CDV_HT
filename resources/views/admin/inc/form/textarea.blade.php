@component('admin.inc.form.form-group', get_defined_vars())
    <div class="input-group">
        @if(isset($iconLeft)) <span class="input-group-addon">{!! $iconLeft !!}</span> @endif
        <textarea {!! $attributes ?? '' !!} class="form-control ime" value="{{ old($name, $value ?? '') }}"
                  rows ='5'   name="{{ $name }}"> </textarea>
        @if(isset($iconRight)) <span class="input-group-addon">{!! $iconRight !!}</span> @endif
        @if(isset($buttonRight)) <span class="input-group-append">{!! $buttonRight !!}</span> @endif
    </div>
    @if(isset($jsError))
        <div class="text-left">
            <span {!! $jsErrorAttributes ?? '' !!} style="color:red; display: none">{{ $jsError ?? '' }}</span>
        </div>
    @endif
@endcomponent
