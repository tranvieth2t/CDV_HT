@extends('admin.layouts.app')
@section('content')
    <div>
        @php($user = \Illuminate\Support\Facades\Auth::guard('admin')->user())

        <div class="card shadow mb-4">
            <div class="card-header"><h1 class="h3 mb-2 text-gray-800">Tân Gia Đình Công Giáo</h1></div>
            <div class="card-body">
                <div class="">
                    <form method="POST" action="{{route('couple.store')}}" enctype="multipart/form-data">
                        @csrf
                        @include('admin.inc.form.input', [
                                     'name' => 'male',
                                     'label' => __('ui.label.couple.male'),
                                     'value' => '',
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="text"'
                                     ])
                        @include('admin.inc.form.select', [
                                   'name' => 'community_male_id',
                                   'label' => __('ui.label.couple.community_male_id'),
                                   'pluck' => $listCommunity,
                                   'colLabel' => 'col-lg-2',
                                   'colInput' => 'col-lg-10',
                                   'value' =>  'none',
                                   'isAll' => true,
                                   'nameAll' => 'Khác'
                               ])
                        @include('admin.inc.form.input', [
                                     'name' => 'female',
                                     'label' => __('ui.label.couple.female'),
                                     'value' => '',
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="text"'
                                     ])
                        @include('admin.inc.form.input', [
                                        'name' => 'date_wedding',
                                        'label' => __('ui.label.couple.date_wedding'),
                                        'value' => '',
                                        'colLabel' => 'col-lg-2 ',
                                        'colInput' => 'col-lg-10 ',
                                        'attributes' => 'type ="datetime-local"'
                                        ])
                        @include('admin.inc.form.select', [
                                   'name' => 'community_female_id',
                                   'label' => __('ui.label.couple.community_female_id'),
                                   'pluck' => $listCommunity,
                                   'colLabel' => 'col-lg-2',
                                   'colInput' => 'col-lg-10',
                                   'value' =>  'none',
                                   'isAll' => true,
                                   'nameAll' => 'Khác'
                               ])

                        @include('admin.inc.form.input', [
                                     'name' => 'thumbnail',
                                     'label' => __('ui.label.couple.thumbnail'),
                                     'value' => '',
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="file"'
                                     ])

                        @include('admin.inc.form.textarea', [
                                     'name' => 'description',
                                     'label' => __('ui.label.couple.description'),
                                     'value' => '',
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="text" '
                                     ])
                        <div class="mb-3 div-edit-editor w-100 col-12">
                            <label for="couple-content"
                                   class="form-label control-label  my-0  font-weight-bold ">{{ __('ui.label.couple.content') }}</label>
                            <textarea name="content" class="edit-content" id="couple-content">
                                 {{old('content') ?? ""}}
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
    @include('admin.couple.config_editor')
@endpush
