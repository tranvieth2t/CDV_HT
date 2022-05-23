@extends('admin.layouts.app')
@section('content')
    <div>
        @php($admin = \Illuminate\Support\Facades\Auth::guard('admin')->user() )
        <div class="card shadow mb-4">
            <div class="card-header"><h1 class="h3 mb-2 text-gray-800">Tân Gia đình Công giáo</h1></div>
            <div class="card-body">
                <div class="table-responsive pt-2">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th class="col-1">ID</th>
                            <th class="col-2">{{__('ui.label.couple.male')}}</th>
                            <th class="col-1">{{__('ui.label.couple.community_male_id')}}</th>
                            <th class="col-2">{{__('ui.label.couple.female')}}</th>
                            <th class="col-1">{{__('ui.label.couple.community_female_id')}}</th>
                            <th class="col-1">{{__('ui.label.couple.verify')}}</th>
                            <th class="col-1">{{__('ui.label.couple.admin')}}</th>
                            <th class="col-2">{{__('ui.label.couple.date_wedding')}}</th>
                            <th class="col-2">{{__('ui.label.couple.note')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listCouple as $couple)
                            <tr>
                                <td>{{$couple->id}}</td>
                                <td>{!!$couple->male!!}</td>
                                <td>{!!$couple->communityMale->name ?? "Khác"!!}</td>
                                <td>{!!$couple->female!!}</td>
                                <td>{!!$couple->communityFemale->name ?? "Khác"!!}</td>
                                <td>{{trans('enums.couple_verify')[$couple->verify]}}</td>
                                <td>{{$couple->admin->name}}</td>
                                <td>{{$couple->date_wedding}}</td>
                                <td>
                                    <a class="btn btn-outline-primary" data-toggle="tooltip"
                                       data-placement="top"
                                       title="{{__('btn.edit')}}"
                                       href="{{route('couple.edit', [$couple->id])}}">
                                        <span>
                                            <i class="fas fa-edit fa-fw"></i>
                                        </span>
                                    </a>

                                    <button type="button"
                                            class="btn btn-outline-warning couple-verify"
                                            data-toggle="modal"
                                            data-target="#exampleModalVerify" data-toggle="tooltip"
                                            data-placement="top"
                                            data-url="{{route('couple.verify', [$couple->id])}}"
                                            title="{{__('btn.couple-verify')}}">
                                        <i class="fas fa-diagram-successor fa-fw"> </i>
                                    </button>

                                    <button type="button"
                                            class="btn btn-outline-dark couple-destroy"
                                            data-toggle="modal"
                                            data-target="#exampleModalDelete" data-toggle="tooltip"
                                            data-placement="top"
                                            data-url="{{route('couple.destroy', [$couple->id])}}"
                                            title="{{__('btn.couple-destroy')}}">
                                        <i class="fas fa-delete-left fa-fw"> </i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $listCouple->links() !!}
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalVerify" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận chuyển trạng thái </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{__('btn.close')}}</button>
                    <button data-url="" type="button" class="btn btn-primary btn-cf-verify"
                            style="color: white">{{__('btn.confirm')}}</button>
                </div>
            </div>
        </div>
    </div>
    {{--    Delete--}}
    <div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận xoas baif vieets </h5>
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


        $('.couple-verify').click(function () {
            $('#exampleModalVerify .modal-content .btn-cf-verify').attr(
                'data-url', $(this).attr('data-url')
            )
        })

        $('.btn-cf-verify').click(function () {
            $.ajax({
                type: "GET",
                url: $(this).attr('data-url'), //resource
                success: function (response) {
                    window.location.reload()
                },
                error: function (response) {
                    $('#error-modal-content').text("{{trans('message.admin.couple.deletedError')}}");
                    $('#error-modal').modal('show');
                }
            });
            console.log($(this).attr('data-url'))
            $('#exampleModalVerify button[data-dismiss="modal"]').click()
        })


        $('.couple-destroy').click(function () {
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
                    $('#error-modal-content').text("{{trans('message.admin.couple.deletedError')}}");
                    $('#error-modal').modal('show');
                }
            });
            $('#exampleModalDelete button[data-dismiss="modal"]').click()
        })
    </script>
@endpush
