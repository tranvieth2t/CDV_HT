@extends('admin.layouts.app')
@section('content')
    <div>
        @php($user = \Illuminate\Support\Facades\Auth::guard('admin')->user())
        <div class="card shadow mb-4">
            <div class="card-header">      <h1 class="h3 mb-2 text-gray-800">Thông báo</h1></div>
            <div class="card-body">
                <div class="">
                    <form method="POST" action="{{route('notify.store')}}" enctype="multipart/form-data">
                        @csrf
                        @include('admin.inc.form.input', [
                                     'name' => 'title',
                                     'label' => __('ui.label.notify.title'),
                                     'value' => '',
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="text"'
                                     ])
                        @include('admin.inc.form.input', [
                                     'name' => 'thumbnail',
                                     'label' => __('ui.label.notify.thumbnail'),
                                     'value' => '',
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="file"'
                                     ])
                        @include('admin.inc.form.textarea', [
                                     'name' => 'description',
                                     'label' => __('ui.label.notify.description'),
                                     'value' => '',
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="text" '
                                     ])
                        @include('admin.inc.form.select', [
                                    'name' => 'community_id',
                                    'label' => __('ui.label.notify.community'),
                                    'pluck' => $listCommunity,
                                    'colLabel' => 'col-lg-2 col-sm-4',
                                    'colInput' => 'col-lg-4 col-sm-8',
                                    'value' => 'none'
                                ])

                        <div class="mb-3 div-edit-editor w-100 col-12">
                            <label for="notify-content" class="form-label control-label  my-0  font-weight-bold ">{{ __('ui.label.notify.content') }}</label>
                            <textarea name="content" class="edit-content" id="notify-content">
                                {{ old('content') ?? '' }}
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
    @include('admin.inc.error_modal')
@endsection

@push('scripts')
    @include('admin.notify.config_editor')
@endpush
