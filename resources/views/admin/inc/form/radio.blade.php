@component('inc.form.form-group', get_defined_vars())
    @foreach($values as $key => $title)
        <div class="custom-control custom-radio @if(!isset($customControlBlock)) custom-control-inline @endif pt-2">
            <input {!! $attributes ?? '' !!} @if($key == old($name, $value ?? '')) checked @endif type="radio" id="{{ !empty($formName) ? ($formName.'__') : '' }}{{ $name }}-{{ $key }}"
                   name="{{ $name }}"
                   class="custom-control-input" value="{{ $key }}"
                   @if(isset($isDisabled) && $isDisabled && $value != $key) disabled @endif
            >
            <label class="custom-control-label green" for="{{ !empty($formName) ? ($formName.'__') : '' }}{{ $name }}-{{ $key }}">{{ $title  }}</label>
        </div>
    @endforeach
@endcomponent
