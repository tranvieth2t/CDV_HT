@extends('admin.layouts.app')
@section('content')
    <div>
        @php($user = \Illuminate\Support\Facades\Auth::guard('admin')->user())
        <h1 class="h3 mb-2 text-gray-800">Banner</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="">
                    <form method="POST" action="{{route('banner.store')}}" enctype="multipart/form-data">
                        @csrf
                        @include('admin.inc.form.input', [
                                     'name' => 'title',
                                     'label' => __('ui.label.banner.title'),
                                     'value' => '',
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="text"'
                                     ])
                        @include('admin.inc.form.input', [
                                     'name' => 'thumbnail',
                                     'label' => __('ui.label.banner.thumbnail'),
                                     'value' => '',
                                     'colLabel' => 'col-lg-2 ',
                                     'colInput' => 'col-lg-10 ',
                                     'attributes' => 'type ="file"'
                                     ])
                        @include('admin.inc.form.input', [
                                   'name' => 'thumbnail_small',
                                    'label' => __('ui.label.banner.thumbnail_small'),
                                   'value' => '',
                                   'colLabel' => 'col-lg-2 ',
                                   'colInput' => 'col-lg-10 ',
                                   'attributes' => 'type ="file"'
                       ])
                        @include('admin.inc.form.input', [
                                    'name' => 'link',
                                    'label' => __('ui.label.banner.link'),
                                    'value' => '',
                                    'colLabel' => 'col-lg-2 ',
                                    'colInput' => 'col-lg-10 ',
                                    'attributes' => 'type ="text"'
                                    ])
                        @include('admin.inc.form.input', [
                                    'name' => 'start_date',
                                    'label' => __('ui.label.banner.start_date'),
                                    'value' => '',
                                    'colLabel' => 'col-lg-2 ',
                                    'colInput' => 'col-lg-10 ',
                                    'attributes' => 'type ="datetime-local"'
                                    ])
                        @include('admin.inc.form.input', [
                                 'name' => 'end_date',
                                 'label' => __('ui.label.banner.start_date'),
                                 'value' => '',
                                 'colLabel' => 'col-lg-2 ',
                                 'colInput' => 'col-lg-10 ',
                                 'attributes' => 'type ="datetime-local"'
                                 ])

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
{{--    @include('admin.banner.config_editor')--}}
@endpush
