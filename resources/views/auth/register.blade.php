@extends('clients.layouts.app')

@section('content')
    <main class="bg-grey pt-80 pb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap widget-taber-content p-30 bg-white border-radius-10">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1 text-center">
                                <h3 class="mb-30 font-weight-900">Create an account</h3>
                            </div>
                            <form method="post" >
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required="" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required="" type="password" name="password" placeholder="Confirm password">
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                            <label class="form-check-label" for="exampleCheckbox1"><span>I agree to terms &amp; Policy.</span></label>
                                        </div>
                                    </div>
                                    <a class="text-muted" href="#">Lean more</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn-block">Submit &amp; Register</button>
                                </div>
                            </form>
                            <div class="divider-text-center mt-15 mb-15">
                                <span> or</span>
                            </div>
                            <ul class="btn-login list_none text-center mb-15">
                                <li><a href="#" class="btn btn-facebook"><i class="elegant-icon social_facebook  mr-5"></i>Facebook</a></li>
                                <li><a href="#" class="btn btn-google"><i class="elegant-icon social_googleplus mr-5"></i>Google</a></li>
                            </ul>
                            <div class="text-muted text-center">Already have an account? <a href="page-login.html.htm">Sign up now</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
