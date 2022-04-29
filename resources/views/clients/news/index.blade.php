@extends('clients.layouts.app')
@section('content')
    <div id='main'>
        <div class="fb-login-button" data-width="" data-size="medium" data-button-type="login_with"
             data-layout="rounded" data-auto-logout-link="false" data-use-continue-as="false">đăng nhập bằng fb</div>
    </div>
@endsection

@push('scripts')
    <script !src="">

        // $(".swiper-wrapper").owlCarousel({
        //     slideSpeed: 300,
        //     paginationSpeed: 400,
        //     items: 1,
        //     autoplay: true,
        //     loop: true,
        //     dots:true
        // });
    </script>
@endpush
