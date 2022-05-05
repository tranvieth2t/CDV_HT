@extends('admin.layouts.app')
@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">{{__('ui.label.update-info')}}</h1>
                        </div>
                        @php($admin = \Illuminate\Support\Facades\Auth::guard('admin')->user())
                        <form class="user" method="POST"
                              action="{{route('admin.update-password', ['id' => $admin->id])}}">
                            @csrf
                            <div class="form-group">
                                <input disabled type="email" name="email" class="form-control form-control-user"
                                       id="exampleInputEmail" aria-describedby="emailHelp"
                                       placeholder="Enter Email Address..."
                                       value="{{$admin->email}}"
                                >
                            </div>
                            <div class="form-group">
                                <input  type="text" name="name" class="form-control form-control-user"
                                       id="exampleInputName" aria-describedby="name"
                                        value="{{$admin->name}}"
                                       placeholder="Enter name">
                                @error('name')
                                <span style="color: red">{{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user"
                                       id="exampleInputPassword" placeholder="Nhập mật khẩu mới" value="{{old('password')}}">
                                @error('password')
                                <span style="color: red">{{$message}} </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="cf_password" class="form-control form-control-user"
                                       id="exampleInputCfPassword" value="{{old('cf_password')}}" placeholder="Xác nhận mật khẩu mới">
                                @error('cf_password')
                                <span style="color: red">{{$message}} </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                {{__('btn.confirm')}}
                            </button>
                            <hr>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
