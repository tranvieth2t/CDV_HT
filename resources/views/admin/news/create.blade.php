@extends('admin.layouts.app')
@section('content')
    <div>
        @php($user = \Illuminate\Support\Facades\Auth::guard('admin')->user())
        <h1 class="h3 mb-2 text-gray-800">Tin tức</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form method="POST" action="{{route('news.store')}}" enctype="multipart/form-data">
                            @csrf
                            @include('admin.inc.form.input', [
                                         'name' => 'title',
                                         'label' => __('ui.label.news.title'),
                                         'value' => '',
                                         'colLabel' => 'col-lg-2 ',
                                         'colInput' => 'col-lg-10 ',
                                         'attributes' => 'type ="text"'
                                         ])
                            @include('admin.inc.form.input', [
                                         'name' => 'thumbnail',
                                         'label' => __('ui.label.news.thumbnail'),
                                         'value' => '',
                                         'colLabel' => 'col-lg-2 ',
                                         'colInput' => 'col-lg-10 ',
                                         'attributes' => 'type ="file"'
                                         ])
                            @include('admin.inc.form.textarea', [
                                         'name' => 'description',
                                         'label' => __('ui.label.news.description'),
                                         'value' => '',
                                         'colLabel' => 'col-lg-2 ',
                                         'colInput' => 'col-lg-10 ',
                                         'attributes' => 'type ="text" '
                                         ])
                            @include('admin.inc.form.select', [
                                        'name' => 'community_id',
                                        'label' => __('ui.label.news.community'),
                                        'pluck' => $listCommunity,
                                        'colLabel' => 'col-lg-2 col-sm-4',
                                        'colInput' => 'col-lg-4 col-sm-8',
                                        'value' => 'none'
                                    ])
                            @include('admin.inc.form.select', [
                                        'name' => 'tag',
                                        'label' => __('ui.label.news.tag'),
                                        'pluck' => __('enums.news_tag'),
                                        'colLabel' => 'col-lg-2 col-sm-4',
                                        'colInput' => 'col-lg-4 col-sm-8',
                                        'value' => \App\Enums\NewsTag::KH,
                                    ])

{{--                            @include('admin.inc.form.textarea', [--}}
{{--                                        'name' => 'content',--}}
{{--                                        'label' => __('ui.label.news.content'),--}}
{{--                                        'value' => '',--}}
{{--                                        'colLabel' => 'col-lg-2 ',--}}
{{--                                        'colInput' => 'col-lg-10 ',--}}
{{--                                         'rows' => 30,--}}
{{--                                        'attributes' => 'type ="text" id="news-content"'--}}
{{--                                        ])--}}
                            <div class="mb-3 div-edit-editor w-100 col-12">
                                <label for="news-content" class="form-label control-label  my-0  font-weight-bold ">{{ __('ui.label.news.content') }}</label>
                                <textarea name="content" class="edit-content" id="news-content">
                                     {{old('content') ?? ""}}
                                </textarea>
                            </div>
                            <div class="justify-content-center d-flex">
                                <button type="submit" class="btn btn-primary"> {{__('btn.confirm')}} </button>
                            </div>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.inc.error_modal')
@endsection

@push('scripts')
    @include('admin.news.config_editor')
@endpush
