@component('admin.inc.form.form-group', get_defined_vars())
    <div class="input-group">
        <select class="form-control" id="{{ $name }}" name="{{ $name }}" {!! $selectAttributes ?? '' !!}>
            @foreach($pluck as $key => $title)
                <option {!! $attributes ?? '' !!} value="{{ $key }}"
                        @if($key == old($name, $value ?? '')) selected @endif>{{ Str::limit($title,40) }}</option>
            @endforeach
            @isset($isAll)
                <option value="none" @if('none' == old($name, $value ?? ''))  selected @endif>{{$nameAll}}</option>
            @endisset
        </select>
        @if(isset($iconRight))
            <span class="input-group-addon" style="border: none; background-color: inherit;">{!! $iconRight !!}</span>
        @endif
    </div>
@endcomponent
