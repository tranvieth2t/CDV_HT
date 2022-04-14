@extends('admin.layouts.app')
@section('content')
    <div>
        <h1 class="h3 mb-2 text-gray-800">Thêm admin</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="justify-content-center">
                    <form method="POST" action="{{route('admins.store')}}">
                        @csrf
                        @include('admin.inc.form.input', [
                                   'name' => 'name',
                                   'label' => __('ui.label.admins.name'),
                                   'value' => '',
                                   'colLabel' => 'col-lg-2 col-sm-4',
                                   'colInput' => 'col-lg-4 col-sm-8',
                                   'attributes' => 'type ="text" maxlength="255"'
                                   ])
                        @include('admin.inc.form.input', [
                                    'name' => 'email',
                                    'label' => __('ui.label.admins.email'),
                                    'value' => '',
                                    'colLabel' => 'col-lg-2 col-sm-4',
                                    'colInput' => 'col-lg-4 col-sm-8',
                                    'attributes' => ' type ="text" maxlength="255"'
                                    ])

                        @include('admin.inc.form.select', [
                                   'name' => 'role_code',
                                   'label' => __('ui.label.admins.role'),
                                   'pluck' =>  [
                                       \App\Enums\AdminRole::SUPPER_ADMIN   => 'SuperAdmin',
                                       \App\Enums\AdminRole::ADMIN          => 'Admin',
                                       \App\Enums\AdminRole::EDITS          => 'Editor',],
                                   'colLabel' => 'col-lg-2 col-sm-4',
                                   'colInput' => 'col-lg-4 col-sm-8',
                                   'value' => \App\Enums\AdminRole::EDITS
                               ])
                        @include('admin.inc.form.select', [
                                 'name' => 'community_id',
                                 'label' => __('ui.label.admins.community'),
                                 'pluck' => trans('enums.community'),
                                 'colLabel' => 'col-lg-2 col-sm-4',
                                 'colInput' => 'col-lg-4 col-sm-8',
                                 'value' => \App\Enums\Community::VHT
                             ])
                        <button class="btn-primary btn" type="submit"> {{__('btn.confirm')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div>
        <h1 class="h3 mb-2 text-gray-800">Admin</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{__('ui.label.admins.name')}}</th>
                            <th>{{__('ui.label.admins.email')}}</th>
                            <th>{{__('ui.label.admins.role')}}</th>
                            <th>{{__('ui.label.admins.verify')}}</th>
                            <th>{{__('ui.label.admins.community')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{$admin->id}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->adminRole->name}}</td>
                                <td>{{__('enums.verify')[$admin->verify]}}</td>
                                <td>{{$admin->community ? $admin->community->name :"--"}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $admins->links() !!}

    </div>
@endsection
