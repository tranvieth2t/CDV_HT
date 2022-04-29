@extends('admin.layouts.app')
@section('content')
    <div>
        <h1 class="h3 mb-2 text-gray-800">Tin tức</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="">
                    <form method="POST" action="{{route('banner.update', $banner->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.inc.form.input', [
                                     'name' => 'title',
                                     'label' => __('ui.label.banner.title'),
                                     'value' => $banner->title,
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="text"'
                                     ])
                        @include('admin.inc.form.input', [
                                     'name' => 'link',
                                     'label' => __('ui.label.banner.link'),
                                     'value' => $banner->link,
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="text"'
                                     ])
                        @include('admin.inc.form.input', [
                                     'name' => 'start_date',
                                     'label' => __('ui.label.banner.start_date'),
                                     'value' => date('Y-m-d\TH:i', strtotime($banner->start_date)),
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="datetime-local"'
                                     ])
                        @include('admin.inc.form.input', [
                                 'name' => 'end_date',
                                 'label' => __('ui.label.banner.end_date'),
                                 'value' => date('Y-m-d\TH:i', strtotime($banner->end_date)),
                                 'colLabel' => 'col-lg-2 ',
                                 'colInput' => 'col-lg-10 ',
                                 'attributes' => 'type ="datetime-local"'
                                 ])
                        @include('admin.inc.form.input', [
                             'name' => 'thumbnail',
                             'label' => __('ui.label.banner.thumbnail'),
                             'value' => $banner->thumbnail,
                             'colLabel' => 'col-lg-2 ',
                             'colInput' => 'col-lg-10 ',
                             'attributes' => 'type ="file"'
                             ])
                        <div class="form-group mb-0 row py-1">
                            <label class="col-lg-2 control-label  my-0  font-weight-bold "> Xem trước</label>
                            <div class="col-lg-10">
                                <div>
                                    <img style="width: 800px;  object-fit: contain"
                                         src="{{getDomainShowImage().$banner->thumbnail}}">
                                </div>
                            </div>
                        </div>
                        @include('admin.inc.form.input', [
                           'name' => 'thumbnail_small',
                            'label' => __('ui.label.banner.thumbnail_small'),
                           'value' => $banner->thumbnail_small,
                           'colLabel' => 'col-lg-2 ',
                           'colInput' => 'col-lg-10 ',
                           'attributes' => 'type ="file"'
                           ])

                        <div class="form-group mb-0 row py-1">
                            <label class="col-lg-2 control-label  my-0  font-weight-bold "> Xem trước</label>
                            <div class="col-lg-10">
                                <div>
                                    <img style="width: 400px;  object-fit: contain"
                                         src="{{getDomainShowImage().$banner->thumbnail_small}}">
                                </div>
                            </div>
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

@endpush
