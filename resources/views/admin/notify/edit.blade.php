@extends('admin.layouts.app')
@section('content')
    <div>
        <h1 class="h3 mb-2 text-gray-800">Tin tức</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="">
                    <form method="POST" action="{{route('notify.update', $notify->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.inc.form.input', [
                                     'name' => 'title',
                                     'label' => __('ui.label.notify.title'),
                                     'value' => $notify->title,
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="text"'
                                     ])

                        @include('admin.inc.form.input', [
                             'name' => 'thumbnail',
                             'label' => __('ui.label.notify.thumbnail'),
                             'value' => $notify->thumbnail,
                             'colLabel' => 'col-lg-2 ',
                             'colInput' => 'col-lg-10 ',
                             'attributes' => 'type ="file"'
                             ])
                        <div class="form-group mb-0 row py-1">
                            <label class="col-lg-2 control-label  my-0  font-weight-bold "> Xem trước</label>
                            <div class="col-lg-10">
                                <div>
                                    <img style="width: 400px;  object-fit: contain"
                                         src="{{getDomainShowImage().$notify->thumbnail}}">
                                </div>
                            </div>
                        </div>
                        @include('admin.inc.form.textarea', [
                                     'name' => 'description',
                                     'label' => __('ui.label.notify.description'),
                                     'value' => $notify->description,
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="text" maxlength="255"'
                                     ])
                        @include('admin.inc.form.select', [
                                    'name' => 'community_id',
                                    'label' => __('ui.label.notify.community'),
                                    'pluck' => $listCommunity,
                                    'colLabel' => 'col-lg-2 col-sm-4',
                                    'colInput' => 'col-lg-4 col-sm-8',
                                    'value' => $notify->community_id,
                                ])


                        <div class="mb-3 div-edit-editor w-100 col-12">
                            <label for="notify-content"
                                   class="form-label control-label  my-0  font-weight-bold ">{{ __('ui.label.notify.content') }}</label>
                            <textarea name="content" class="edit-content" id="notify-content">
                                {{old('notify')??$notify->content}}
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
        @include('admin.notify.config_editor')
    @endpush
@endpush
