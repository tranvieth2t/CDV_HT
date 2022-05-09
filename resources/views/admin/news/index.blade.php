@extends('admin.layouts.app')
@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h1 class="h3 mb-2 text-gray-800">Tìm kiếm</h1>
        </div>
        <div class="card-body">
            <form method="GET" action="{{route('news.index')}}">
                @include('admin.inc.form.select', [
                                   'name' => 'filter[community_id]',
                                   'label' => __('ui.label.news.community'),
                                   'pluck' => $listCommunity,
                                   'colLabel' => 'col-lg-2',
                                   'colInput' => 'col-lg-10',
                                   'value' => $filter['community_id']?? 'none',
                                   'isAll' => true,
                                   'nameAll' => 'Tất cả'
                               ])
                @include('admin.inc.form.select', [
                                   'name' => 'filter[orderBy]',
                                   'label' => __('ui.label.news.orderby'),
                                   'pluck' => config('setting.orderBy'),
                                   'colLabel' => 'col-lg-2',
                                   'colInput' => 'col-lg-10',
                                   'value' => $filter['orderBy']?? 'none',
                               ])
                @include('admin.inc.form.input', [
                                    'name' => 'filter[title]',
                                    'label' => __('ui.label.news.title'),
                                    'value' => $filter['title']?? '',
                                    'colLabel' => 'col-lg-2 ',
                                    'colInput' => 'col-lg-10 ',
                                    'attributes' => 'type ="text" maxlength="255"'
                                    ])
                @include('admin.inc.form.input', [
                                   'name' => 'filter[startDate]',
                                   'label' => __('ui.label.news.start-date'),
                                   'value' => $filter['startDate']?? '',
                                   'colLabel' => 'col-lg-2 ',
                                   'colInput' => 'col-lg-10 ',
                                   'attributes' => 'type ="datetime-local" maxlength="255"'
                                   ])
                @include('admin.inc.form.input', [
                                   'name' => 'filter[endDate]',
                                   'label' => __('ui.label.news.end-date'),
                                   'value' => $filter['endDate']?? '',
                                   'colLabel' => 'col-lg-2 ',
                                   'colInput' => 'col-lg-10 ',
                                   'attributes' => 'type ="datetime-local" maxlength="255"'
                                   ])
                @include('admin.inc.form.checkbox', [
                                   'name' => 'filter[verify]',
                                   'label' => __('ui.label.news.verify'),
                                   'value' => $filter['verify']?? \App\Enums\NewsVerify::ALL,
                                   'colLabel' => 'col-lg-2 ',
                                   'colInput' => 'col-lg-10 ',
                                   'values' => trans('enums.news_verify'),
                                   'attributes' => 'type="radio"',
                                   ])
                @include('admin.inc.form.checkbox', [
                              'name' => 'filter[hot]',
                              'label' => __('ui.label.news.hot'),
                              'value' => $filter['hot']?? \App\Enums\NewsHot::ALL,
                              'colLabel' => 'col-lg-2 ',
                              'colInput' => 'col-lg-10 ',
                              'values' => trans('enums.news_hot'),
                              'attributes' => 'type="radio"',
                              ])
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary m-2">{{__('btn.confirm')}}</button>
                    <a href="{{route('news.index')}}" class="btn btn-warning m-2 ">{{__('btn.reset')}}</a>
                </div>
            </form>
        </div>
    </div>
    <div>

        @php($admin = \Illuminate\Support\Facades\Auth::guard('admin')->user() )
        <div class="card shadow mb-4">
            <div class="card-header"><h1 class="h3 mb-2 text-gray-800">Tin tức</h1></div>
            <div class="card-body">
                <div class="table-responsive pt-2">
                    <table class="table table-bordered" id="dataTable" style="width:100%; cellspacing=" 0
                    "" >
                    <thead>
                    <tr>
                        <th class="col-1">ID</th>
                        <th class="col-2">{{__('ui.label.news.title')}}</th>
                        <th class="col-1">{{__('ui.label.news.verify')}}</th>
                        <th class="col-1">{{__('ui.label.news.hot')}}</th>
                        <th class="col-1">{{__('ui.label.news.tag')}}</th>
                        <th class="col-1">{{__('ui.label.news.admin')}}</th>
                        <th class="col-2">{{__('ui.label.news.community')}}</th>
                        <th class="col-2">{{__('ui.label.news.created_at')}}</th>
                        <th class="col-1">{{__('ui.label.news.note')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listNews as $news)
                        <tr>
                            <td>{{$news->id}}</td>
                            <td>{{$news->title}}</td>
                            <td>{{trans('enums.news_verify')[$news->verify]}}</td>
                            <td>{{trans('enums.news_hot')[$news->hot]}}</td>
                            <td>{{__('enums.news_tag')[$news->tag]}}</td>
                            <td>{{$news->admin->name}}</td>
                            <td>{{$news->community->name ?? "Khác"}}</td>
                            <td>{{convertTimeDbToTimeString($news->created_at)}}</td>
                            <td>
                                <a target="_blank" class="btn btn-outline-danger"
                                   data-placement="top"
                                   href="{{route('clients.news.show', [$news->id])}}"
                                   title="{{__('btn.news-preview')}}">
                                    <i class="fas fa-arrows-to-eye fa-fw"> </i>
                                </a>
                                @if($admin->role_admin != \App\Enums\AdminRole::EDITS)
                                    <a class="btn btn-outline-primary" data-toggle="tooltip"
                                       data-placement="top"
                                       title="{{__('btn.edit')}}"
                                       href="{{route('news.edit', [$news->id])}}"><span>
                                            <i class="fas fa-edit fa-fw"></i></span></a>
                                    @if($news->verify == \App\Enums\NewsVerify::VERIFY)
                                        <button type="button" class="btn btn-outline-danger news-request-hot"
                                                data-toggle="modal"
                                                data-target="#exampleModalHot" data-toggle="tooltip"
                                                data-placement="top"
                                                data-url="{{route('news.setNews', [$news->id])}}"
                                                title="{{__('btn.news-hot')}}">
                                            <i class="fas fa-mug-hot fa-fw"> </i>
                                        </button>
                                    @endif
                                    <button type="button"
                                            class="btn btn-outline-warning news-request-status"
                                            data-toggle="modal"
                                            data-target="#exampleModalVerify" data-toggle="tooltip"
                                            data-placement="top"
                                            data-url="{{route('news.verify', [$news->id])}}"
                                            title="{{$news->verify == \App\Enums\NewsVerify::VERIFY ?__('btn.news-not-verify'):__('btn.news-verify')}}">
                                        <i class="fas fa-diagram-successor fa-fw"> </i>
                                    </button>
                                @endif
                                @if($admin->role_admin == \App\Enums\AdminRole::EDITS)
                                    <button type="button" class="btn btn-success news-request-verify"
                                            data-toggle="modal"
                                            data-censors="{{$news->censors}}"
                                            data-target="#exampleModalCenter" data-toggle="tooltip"
                                            data-placement="top"
                                            data-action="{{route('news.wait', [$news->id])}}"
                                            title="{{__('btn.news-request-verify')}}">
                                        <i class="fas fa-diagram-successor fa-fw"> </i>
                                    </button>
                                @endif
                                <button type="button"
                                        class="btn btn-outline-dark news-destroy"
                                        data-toggle="modal"
                                        data-target="#exampleModalDelete" data-toggle="tooltip"
                                        data-placement="top"
                                        data-url="{{route('news.destroy', [$news->id])}}"
                                        title="{{__('btn.news-destroy')}}">
                                    <i class="fas fa-delete-left fa-fw"> </i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                    </table>
                    {!! $listNews->appends(['filter' => $filter])->links()!!}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Yêu cầu duyệt bài</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-input-note" method="POST" action="">
                    <div class="modal-body">
                        @csrf
                        <div class="modal-selected">
                            <h3></h3>
                            @include('admin.inc.form.select', [
                                          'name' => 'censors',
                                          'label' => __('ui.label.news.censors'),
                                          'pluck' => $listAdminCensors,
                                          'colLabel' => 'col-12',
                                          'colInput' => 'col-12',
                                      ])
                        </div>
                        <div class="modal-input-note">
                            @include('admin.inc.form.textarea', [
                                          'name' => 'note',
                                          'label' => __('ui.label.news.content'),
                                          'value' => '',
                                          'colLabel' => 'col-12',
                                          'colInput' => 'col-12 ',
                                           'rows' => 6,
                                          'attributes' => 'id= "content" type ="text" '
                                          ])
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{__('btn.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('btn.send-mail')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ModalHot -->
    <div class="modal fade" id="exampleModalHot" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận chuyển thành tin hot</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{__('btn.close')}}</button>
                    <a type="button" class="btn btn-primary" style="color: white">{{__('btn.confirm')}}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ModalVerify -->
    <div class="modal fade" id="exampleModalVerify" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận thay đổi trạng thái </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{__('btn.close')}}</button>
                    <a type="button" class="btn btn-primary" style="color: white">{{__('btn.confirm')}}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận xoá bài viết </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{__('btn.close')}}</button>
                    <button data-url="" type="button" class="btn btn-primary btn-cf-detele"
                            style="color: white">{{__('btn.confirm')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script !src=''>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $('.news-request-hot').click(function () {
            $('#exampleModalHot .modal-content a').attr(
                'href', $(this).attr('data-url')
            )
        })
        $('.news-destroy').click(function () {
            $('#exampleModalDelete .modal-content .btn-cf-detele').attr(
                'data-url', $(this).attr('data-url')
            )
        })

        $('.btn-cf-detele').click(function () {
            $.ajax({
                type: "DELETE",
                data: {"_token": "{{ csrf_token() }}"},
                url: $(this).attr('data-url'), //resource
                success: function (response) {
                    window.location.reload()
                },
                error: function (response) {
                    console.log(response)
                    $('#error-modal-content').text("{{trans('message.admin.news.deletedError')}}");
                    $('#error-modal').modal('show');
                }
            });
            $('#exampleModalDelete button[data-dismiss="modal"]').click()
        })

        $('.news-request-status').click(function () {
            $('#exampleModalVerify .modal-content a').attr(
                'href', $(this).attr('data-url')
            )
            $('exampleModalDelete').hide()
        })
        $('.news-request-verify').click(function () {
            $('#form-input-note textarea').val('')
            $('#form-input-note select').val($(this).attr('data-censors'))
            let action = $(this).attr('data-action')
            $('#form-input-note').attr('action', action)
        });

    </script>
@endpush
