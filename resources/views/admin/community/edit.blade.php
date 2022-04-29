@extends('admin.layouts.app')
@section('content')
    <div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <h1 class="h3 mb-2 text-gray-800">Cộng đoàn</h1>
            </div>
            <div class="card-body">
                <div class="">
                    <form method="POST" action="{{route('community.update', $community->id) }}">
                        @csrf
                        @method('PUT')
                        @include('admin.inc.form.input', [
                                     'name' => 'name',
                                     'label' => __('ui.label.community.name'),
                                     'value' => $community->name,
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="text" maxlength="255"'
                                     ])
                        @include('admin.inc.form.input', [
                                  'name' => 'facebook',
                                  'label' => __('ui.label.community.facebook'),
                                  'value' => $community->facebook,
                                  'colLabel' => 'col-lg-2 ',
                                  'colInput' => 'col-lg-10 ',
                                  'attributes' => 'type ="text" maxlength="255"'
                                  ])
                        @include('admin.inc.form.input', [
                                    'name' => 'instagram',
                                    'label' => __('ui.label.community.instagram'),
                                    'value' => $community->instagram,
                                    'colLabel' => 'col-lg-2 ',
                                    'colInput' => 'col-lg-10 ',
                                    'attributes' => 'type ="text" maxlength="255"'
                                    ])
                        @include('admin.inc.form.input', [
                                    'name' => 'youtube',
                                    'label' => __('ui.label.community.youtube'),
                                    'value' => $community->youtube,
                                    'colLabel' => 'col-lg-2 ',
                                    'colInput' => 'col-lg-10 ',
                                    'attributes' => 'type ="text" maxlength="255"'
                                    ])
                        @include('admin.inc.form.input', [
                                    'name' => 'tel',
                                    'label' => __('ui.label.community.tel'),
                                    'value' => $community->tel,
                                    'colLabel' => 'col-lg-2 ',
                                    'colInput' => 'col-lg-10 ',
                                    'attributes' => 'type ="text" maxlength="255"'
                                    ])
                        @include('admin.inc.form.textarea', [
                                    'name' => 'description',
                                    'label' => __('ui.label.community.description'),
                                    'value' => $community->description,
                                    'colLabel' => 'col-lg-2 ',
                                    'colInput' => 'col-lg-10 ',
                                    'attributes' => 'type ="text" '
                                    ])
                        @include('admin.inc.form.textarea', [
                                   'name' => 'content',
                                   'label' => __('ui.label.community.content'),
                                   'value' => $community->content,
                                   'colLabel' => 'col-lg-2 ',
                                   'colInput' => 'col-lg-10 ',
                                   'attributes' => 'id="content" type ="text" '
                                   ])
                        <div class="justify-content-center d-flex">
                            <button type="submit" class="btn btn-primary"> {{__('btn.confirm')}} </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script !src="">
        CKEDITOR.replace('content', {
            language:'vi',
        })
    </script>
@endpush
