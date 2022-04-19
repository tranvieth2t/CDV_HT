@extends('admin.layouts.app')
@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h1 class="h3 mb-2 text-gray-800">Tìm kiếm</h1>
        </div>
        <div class="card-body">
            <form method="GET" action="{{route('news.index')}}">
                @include('admin.inc.form.select', [
                                   'name' => 'community_id',
                                   'label' => __('ui.label.news.community'),
                                   'pluck' => $listCommunity,
                                   'colLabel' => 'col-lg-2',
                                   'colInput' => 'col-lg-10',
                                   'value' => $_GET['community_id']?? 'none',
                                   'isAll' => true,
                                   'nameAll' => 'Tất cả'
                               ])
                @include('admin.inc.form.input', [
                                    'name' => 'title',
                                    'label' => __('ui.label.news.title'),
                                    'value' => $_GET['title']?? '',
                                    'colLabel' => 'col-lg-2 ',
                                    'colInput' => 'col-lg-10 ',
                                    'attributes' => 'type ="text" maxlength="255"'
                                    ])
                @include('admin.inc.form.input', [
                                   'name' => 'startDate',
                                   'label' => __('ui.label.news.start-date'),
                                   'value' => $_GET['startDate']?? '',
                                   'colLabel' => 'col-lg-2 ',
                                   'colInput' => 'col-lg-10 ',
                                   'attributes' => 'type ="datetime-local" maxlength="255"'
                                   ])
                @include('admin.inc.form.input', [
                                   'name' => 'endDate',
                                   'label' => __('ui.label.news.end-date'),
                                   'value' => $_GET['endDate']?? '',
                                   'colLabel' => 'col-lg-2 ',
                                   'colInput' => 'col-lg-10 ',
                                   'attributes' => 'type ="datetime-local" maxlength="255"'
                                   ])
                @include('admin.inc.form.checkbox', [
                                   'name' => 'verify',
                                   'label' => __('ui.label.news.verify'),
                                   'value' => $_GET['verify']?? \App\Enums\NewsVerify::ALL,
                                   'colLabel' => 'col-lg-2 ',
                                   'colInput' => 'col-lg-10 ',
                                   'values' => trans('enums.news_verify'),
                                   'attributes' => 'type="radio"',
                                   ])
                @include('admin.inc.form.checkbox', [
                              'name' => 'hot',
                              'label' => __('ui.label.news.hot'),
                              'value' => $_GET['hot']?? \App\Enums\NewsHot::ALL,
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


        <div class="card shadow mb-4">
            <div class="card-header"> <h1 class="h3 mb-2 text-gray-800">Tin tức</h1></div>
            <div class="card-body">
                <div class="table-responsive pt-2">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="col-1">ID</th>
                            <th class="col-2">{{__('ui.label.news.title')}}</th>
                            <th class="col-1">{{__('ui.label.news.verify')}}</th>
                            <th class="col-1">{{__('ui.label.news.admin')}}</th>
                            <th class="col-2">{{__('ui.label.news.community')}}</th>
                            <th class="col-2">{{__('ui.label.news.created_at')}}</th>
                            <th class="col-2">{{__('ui.label.news.note')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listNews as $news)
                            <tr>
                                <td>{{$news->id}}</td>
                                <td>{{$news->title}}</td>
                                <td>{{trans('enums.news_verify')[$news->verify]}}</td>
                                <td>{{$news->admin->name}}</td>
                                <td>{{trans('enums.community')[$news->community_id]}}</td>
                                <td>{{$news->created_at}}</td>
                                <td>
                                    <a class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top"  title="{{__('btn.edit')}}"
                                       href="{{route('news.edit', [$news->id])}}"><span><i class="fas fa-edit fa-fw"></i></span></a>
                                    <a class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top"  title="{{__('btn.news-hot')}}"
                                       href="{{route('news.edit', [$news->id])}}"><span><i class="fas fa-mug-hot fa-fw"></i></span></a>
                                    <a class="btn btn-outline-warning" data-toggle="tooltip" data-placement="top"  title="{{__('btn.news-verify')}}"
                                       href="{{route('news.edit', [$news->id])}}"><span><i class="fas fa-diagram-successor fa-fw"></i></span></a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $listNews->links() !!}
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
 </script>
@endpush
