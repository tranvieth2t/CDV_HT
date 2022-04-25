@extends('clients.layouts.app')
@section('content')
    <div id="main">
        <section>
            <div class="container">
                <div class="section-title">
                    <h2>{{$community->name}}</h2>
                    <p class="px-1 px-md-2 px-sm-1"> {{$community->description}} </p>
                </div>
                <div> {!! $community->content !!}</div>
                <div class="news ">
                    <div class="section-body">
                    </div>
                </div>
            </div>
        </section>

        <section id="portfolio" class="portfolio section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Các hoạt động của Cộng đoàn</h2>
                    <p class="px-5 px-md-2 px-sm-2"></p>
                </div>
                @php($index = 0)
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach($newsHot as $news)
                        <div class="col-lg-3 col-md-4 portfolio-item filter-{{$news->community_id}}">
                            <div class="portfolio-wrap">
                                @php($index++)
                                @php($index = $index % 10 +1)
                                <img src="{{asset('assets/img/portfolio/portfolio-'.$index.'.jpg')}}" class="img-fluid"
                                     alt="">
                                <div class="portfolio-info">
                                    <h4>{{$news->title}}</h4>
                                    <p>{{$news->description}}</p>
                                    <div class="portfolio-links">
                                        <a href="{{asset('assets/img/portfolio/portfolio-'.$index.'.jpg')}}"
                                           data-gall="portfolioGallery"
                                           class="venobox" title="{{$news->title}}"><i class="bx bx-plus"></i></a>
                                        <a href="{{route('admin.login')}}" data-gall="portfolioDetailsGallery"
                                           data-vbtype="iframe" class="venobox" title="Portfolio Details"><i
                                                    class="bx bx-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @include('clients.layouts.slide_left', [
                   'community' => $community,
               ])
    </div>
@endsection
