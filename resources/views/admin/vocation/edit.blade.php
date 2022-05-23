@extends('admin.layouts.app')
@section('content')
    <div>
        <h1 class="h3 mb-2 text-gray-800">Tin tức</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="">
                    <form method="POST" action="{{route('vocation.update', $vocation->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.inc.form.input', [
                                     'name' => 'title',
                                     'label' => __('ui.label.vocation.title'),
                                     'value' => $vocation->title,
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="text"'
                                     ])
                        @include('admin.inc.form.input', [
                                                     'name' => 'date_time',
                                                     'label' => __('ui.label.vocation.date_time'),
                                                     'value' => date('Y-m-d\TH:i', strtotime($vocation->date_time)),
                                                     'colLabel' => 'col-lg-2 ',
                                                     'colInput' => 'col-lg-10 ',
                                                     'attributes' => 'type ="datetime-local"'
                                                     ])
                        @include('admin.inc.form.input', [
                             'name' => 'thumbnail',
                             'label' => __('ui.label.vocation.thumbnail'),
                             'value' => $vocation->thumbnail,
                             'colLabel' => 'col-lg-2 ',
                             'colInput' => 'col-lg-10 ',
                             'attributes' => 'type ="file"'
                             ])

                        <div class="form-group mb-0 row py-1">
                            <label class="col-lg-2 control-label  my-0  font-weight-bold "> Xem trước</label>
                            <div class="col-lg-10">
                                <div>
                                    <img style="width: 400px;  object-fit: contain"
                                         src="{{getDomainShowImage().$vocation->thumbnail}}">
                                </div>
                            </div>
                        </div>
                        @include('admin.inc.form.textarea', [
                                     'name' => 'description',
                                     'label' => __('ui.label.vocation.description'),
                                     'value' => $vocation->description,
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="text" maxlength="255"'
                                     ])
                        @include('admin.inc.form.select', [
                                    'name' => 'community_id',
                                    'label' => __('ui.label.vocation.community'),
                                    'pluck' => $listCommunity,
                                    'colLabel' => 'col-lg-2 col-sm-4',
                                    'colInput' => 'col-lg-4 col-sm-8',
                                    'value' => $vocation->community_id,
                                ])


                        <div class="mb-3 div-edit-editor w-100 col-12">
                            <label for="vocation-content" class="form-label control-label  my-0  font-weight-bold ">{{ __('ui.label.vocation.content') }}</label>
                            <textarea name="content" class="edit-content" id="vocation-content" >
                                {{old('content') ?? $vocation->content}}
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
    @push('scripts')
        @include('admin.vocation.config_editor')
    @endpush
@endpush
