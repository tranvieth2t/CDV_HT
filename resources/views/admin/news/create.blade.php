@extends('admin.layouts.app')
@section('content')
    <div>
        <h1 class="h3 mb-2 text-gray-800">Tin tức</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                            @include('admin.inc.form.textarea', [
                                         'name' => 'description',
                                         'label' => __('ui.label.news.description'),
                                         'value' => '',
                                         'colLabel' => 'col-lg-2 ',
                                         'colInput' => 'col-lg-10 ',
                                         'attributes' => 'type ="text" maxlength="255"'
                                         ])

                            @include('admin.inc.form.textarea', [
                                        'name' => 'content',
                                        'label' => __('ui.label.news.content'),
                                        'value' => '',
                                        'colLabel' => 'col-lg-2 ',
                                        'colInput' => 'col-lg-10 ',
                                        'attributes' => 'type ="text" maxlength="255"'
                                        ])

                            @include('admin.inc.form.select', [
                                      'name' => 'community_id',
                                      'label' => __('ui.label.admins.community'),
                                      'pluck' => trans('enums.community'),
                                      'colLabel' => 'col-lg-2 col-sm-4',
                                      'colInput' => 'col-lg-4 col-sm-8',
                                      'value' => \App\Enums\Community::VHT
                                  ])
                            <div class="justify-content-center d-flex">
                                <button type="submit" class="btn btn-primary" > {{__('btn.confirm')}} </button>
                            </div>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
