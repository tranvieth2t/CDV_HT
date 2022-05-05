@extends('admin.layouts.app')
@section('content')
    <div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <h1 class="h3 mb-2 text-gray-800">Cộng đoàn {{$community->name}}</h1>
            </div>
            <div class="card-body">
                <div class="">
                    <form method="POST" action="{{route('community.update', $community->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.inc.form.input', [
                             'name' => 'thumbnail',
                             'label' => __('ui.label.community.thumbnail'),
                             'value' => $community->thumbnail,
                             'colLabel' => 'col-lg-2 ',
                             'colInput' => 'col-lg-10 ',
                             'attributes' => 'type ="file"'
                             ])
                        <div class="form-group mb-0 row py-1">
                            <label class="col-lg-2 control-label  my-0  font-weight-bold "> Xem trước</label>
                            <div class="col-lg-10">
                                <div>
                                    <img style="width: 800px;  object-fit: contain"
                                         src="{{getDomainShowImage().$community->thumbnail}}">
                                </div>
                            </div>
                        </div>
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
                        <div class="mb-3 div-edit-editor w-100 col-12">
                            <label for="community-content" class="form-label control-label  my-0  font-weight-bold ">{{ __('ui.label.community.content') }}</label>
                            <textarea name="content" class="edit-content" id="community-content">
                                {{$community->content}}
                            </textarea>
                        </div>
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
    @include('admin.community.config_editor')
@endpush
