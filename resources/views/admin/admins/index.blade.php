@extends('admin.layouts.app')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Admin</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $admin)
                        <tr>
                        <td>{{$admin->id}}</td>
                        <td>{{$admin->name}}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->adminRole->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$admins->links()}}
            </div>
        </div>
    </div>
@endsection
