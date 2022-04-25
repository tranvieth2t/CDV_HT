@extends('clients.layouts.app')
@section('content')
    <div id="main">

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="{{asset('assets/img/portfolio/portfolio-1.jpg')}}" alt="">
                            </div>

{{--                            <div class="swiper-slide">--}}
{{--                                <img src="{{asset('assets/img/portfolio/portfolio-1.jpg')}}" alt="">--}}
{{--                            </div>--}}

{{--                            <div class="swiper-slide">--}}
{{--                                <img src="{{asset('assets/img/portfolio/portfolio-1.jpg')}}" alt="">--}}
{{--                            </div>--}}

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>{{$news->title}}</h3>
                        <ul>
                            <li><strong>Title</strong>:{{$news->community->name}} </li>
                            <li><strong>Ngày đăng</strong>:{{$news->created_at}}</li>
{{--                            <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>--}}
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>Description</h2>
                        <p>
                            {{$news->description}}
                        </p>
                    </div>
                </div>
                <div class="col-12" style="overflow:hidden;">{!! $news->content !!}</div>


            </div>

        </div>
    </section><!-- End Portfolio Details Section -->
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
