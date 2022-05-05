<!DOCTYPE html>
<html lang="vi" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
@include("admin.layouts.head")

<body class="bg-gradient-primary">

<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="user" method="POST" action="{{route('admin.update-register')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="email" readonly class="form-control form-control-user"
                                               value="{{$admin->email}}" placeholder="Email">
                                    </div>
                                    <input type="text" name = 'verify_token' hidden value="{{$admin->verify_token}}">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                               id="exampleInputPassword" placeholder="Password">
                                        @error('password')
                                        <span style="color: red">{{$message}} </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="cf_password" class="form-control form-control-user"
                                               id="exampleInputPassword" placeholder="Confrim Password">
                                         @error('cf_password')
                                        <span style="color: red">{{$message}} </span>
                                        @enderror

                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Xác nhận
                                    </button>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.layouts.footer')

</body>

</html>
