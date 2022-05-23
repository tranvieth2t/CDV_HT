@extends('admin.layouts.app')
@section('content')
    <div>
        @php($user = \Illuminate\Support\Facades\Auth::guard('admin')->user())

        <div class="card shadow mb-4">
            <div class="card-header"> <h1 class="h3 mb-2 text-gray-800">Tân Gia Đình Công Giáo</h1></div>
            <div class="card-body">
                <div class="">
                    <form method="POST" action="{{route('couple.update', $couple->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.inc.form.input', [
                                     'name' => 'male',
                                     'label' => __('ui.label.couple.male'),
                                     'value' => $couple->male,
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
                                   'value' =>  $couple->community_male_id ??'none',
                                   'isAll' => true,
                                   'nameAll' => 'Khác'
                               ])
                        @include('admin.inc.form.input', [
                                     'name' => 'female',
                                     'label' => __('ui.label.couple.female'),
                                     'value' => $couple->female,
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="text"'
                                     ])
                        @include('admin.inc.form.select', [
                                   'name' => 'community_female_id',
                                   'label' => __('ui.label.couple.community_female_id'),
                                   'pluck' => $listCommunity,
                                   'colLabel' => 'col-lg-2',
                                   'colInput' => 'col-lg-10',
                                   'value' =>  $couple->community_female_id ??'none',
                                   'isAll' => true,
                                   'nameAll' => 'Khác'
                               ])
                        @include('admin.inc.form.input', [
                                     'name' => 'date_wedding',
                                     'label' => __('ui.label.couple.date_wedding'),
                                     'value' => date('Y-m-d\TH:i', strtotime($couple->date_wedding)),
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="datetime-local"'
                                     ])
                        @include('admin.inc.form.input', [
                                     'name' => 'thumbnail',
                                     'label' => __('ui.label.couple.thumbnail'),
                                     'value' => $couple->thumnbail,
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="file"'
                                     ])
                        <div class="form-group mb-0 row py-1">
                            <label class="col-lg-2 control-label  my-0  font-weight-bold "> Xem trước</label>
                            <div class="col-lg-10">
                                <div>
                                    <img style="width: 400px;  object-fit: contain"
                                         src="{{getDomainShowImage().$couple->thumbnail}}">
                                </div>
                            </div>
                        </div>
                        @include('admin.inc.form.textarea', [
                                     'name' => 'description',
                                     'label' => __('ui.label.couple.description'),
                                     'value' => $couple->description,
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="text" '
                                     ])
                        <div class="mb-3 div-edit-editor w-100 col-12">
                            <label for="couple-content"
                                   class="form-label control-label  my-0  font-weight-bold ">{{ __('ui.label.couple.content') }}</label>
                            <textarea name="content" class="edit-content" id="couple-content">
                                {{old('content') ?? $couple->content}}
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
