@extends('admin.layouts.app')
@section('content')
    <div>
        <h1 class="h3 mb-2 text-gray-800">Tin tức</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="">
                        <form method="POST" action="{{route('news.store')}}">
                            @csrf
                            @include('admin.inc.form.input', [
                                         'name' => 'title',
                                         'label' => __('ui.label.news.title'),
                                         'value' => '',
                                         'colLabel' => 'col-lg-2 ',
                                         'colInput' => 'col-lg-10 ',
                                         'attributes' => 'type ="text" maxlength="255"'
                                         ])
{{--                            @include('admin.inc.form.input', [--}}
{{--                                         'name' => 'title',--}}
{{--                                         'label' => __('ui.label.news.title'),--}}
{{--                                         'value' => '',--}}
{{--                                         'colLabel' => 'col-lg-2 ',--}}
{{--                                         'colInput' => 'col-lg-10 ',--}}
{{--                                         'attributes' => 'type ="file" maxlength="255"'--}}
{{--                                         ])--}}
                            @include('admin.inc.form.textarea', [
                                         'name' => 'description',
                                         'label' => __('ui.label.news.description'),
                                         'value' => '',
                                         'colLabel' => 'col-lg-2 ',
                                         'colInput' => 'col-lg-10 ',
                                         'attributes' => 'type ="text" maxlength="255"'
                                         ])
                            @include('admin.inc.form.select', [
                                        'name' => 'community_id',
                                        'label' => __('ui.label.news.community'),
                                        'pluck' => $listCommunity,
                                        'colLabel' => 'col-lg-2 col-sm-4',
                                        'colInput' => 'col-lg-4 col-sm-8',
                                        'value' => \App\Enums\Community::VHT
                                    ])
                            @include('admin.inc.form.select', [
                                        'name' => 'censors',
                                        'label' => __('ui.label.news.censors'),
                                        'pluck' => $adminCensors,
                                        'colLabel' => 'col-lg-2 col-sm-4',
                                        'colInput' => 'col-lg-4 col-sm-8',
                                        'value' => \App\Enums\Community::VHT
                                    ])

                            @include('admin.inc.form.textarea', [
                                        'name' => 'content',
                                        'label' => __('ui.label.news.content'),
                                        'value' => '',
                                        'colLabel' => 'col-lg-2 ',
                                        'colInput' => 'col-lg-10 ',
                                         'rows' => 30,
                                        'attributes' => 'type ="text" maxlength="255"'
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
