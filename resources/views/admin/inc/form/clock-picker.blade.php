@component('inc.form.form-group', get_defined_vars())
    <div class="input-group clockpicker" data-autoclose="true">
        <span class="input-group-addon">
            <span class="fa fa-clock-o"></span>
        </span>
        <input {!! $attributes ?? '' !!} type="text" class="form-control ime" value="{{ old($name, $value ?? '') }}" id="{{ $name }}"
               name="{{ $name }}">
    </div>
@endcomponent
