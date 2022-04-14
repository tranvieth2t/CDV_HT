@extends('admin.layouts.app')
@section('content')
    <div>
        <h1 class="h3 mb-2 text-gray-800">Tin tức</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="col-1">ID</th>
                            <th class="col-2">{{__('ui.label.news.title')}}</th>
                            <th class="col-1">{{__('ui.label.news.status')}}</th>
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
                                <td>{{$news->verify}}</td>
                                <td>{{$news->admin->name}}</td>
                                <td>{{trans('enums.community')[$news->community_id]}}</td>
                                <td>{{$news->created_at}}</td>
                                <td>
                                    <a class="btn btn-primary"
                                       href="{{route('news.show', [$news->id])}}"><span>{{__('btn.detail')}} </span></a>
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
