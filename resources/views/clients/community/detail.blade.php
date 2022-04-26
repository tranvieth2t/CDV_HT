@extends('clients.layouts.app')
@section('content')
    <main>
        <!--archive header-->
        <div class="archive-header pt-50 text-center">
            <div class="container">
                <h2 class="font-weight-900">{{$community->name}}</h2>
                <div >
                    {{$community->description}}
                </div>
                <div class="bt-1 border-color-1 mt-30 mb-50"></div>
            </div>
        </div>
        <div class="container">
            <div class="loop-grid mb-30">
                <div class="row">
                    <div class="col-lg-8 mb-30">
                        <div class="carausel-post-1 hover-up border-radius-10 overflow-hidden transition-normal position-relative wow fadeInUp animated">
                            <div class="arrow-cover"></div>
                            <div class="slide-fade">
                                <div class="position-relative post-thumb">
                                    <div class="thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-10.jpg)">
                                        <a class="img-link" href="single.html.htm"></a>
                                        <span class="top-left-icon bg-warning"><i class="elegant-icon icon_star_alt"></i></span>
                                        <div class="post-content-overlay text-white ml-30 mr-30 pb-30">
                                            <div class="entry-meta meta-0 font-small mb-20">
                                                <a href="category.html.htm"><span class="post-cat text-info text-uppercase">Travel</span></a>
                                                <a href="category.html.htm"><span class="post-cat text-success text-uppercase">Animal</span></a>
                                            </div>
                                            <h3 class="post-title font-weight-900 mb-20">
                                                <a class="text-white" href="single.html.htm">Beachmaster Elephant Seal Fights off Rival Male, The match is uncompromising</a>
                                            </h3>
                                            <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                                <span class="post-on">20 minutes ago</span>
                                                <span class="hit-count has-dot">23k Views</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative post-thumb">
                                    <div class="thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-12.jpg)">
                                        <a class="img-link" href="single.html.htm"></a>
                                        <span class="top-left-icon bg-danger"><i class="elegant-icon icon_image"></i></span>
                                        <div class="post-content-overlay text-white ml-30 mr-30 pb-30">
                                            <div class="entry-meta meta-0 font-small mb-20">
                                                <a href="category.html.htm"><span class="post-cat text-info text-uppercase">Lifestyle</span></a>
                                            </div>
                                            <h3 class="post-title font-weight-900 mb-20">
                                                <a class="text-white" href="single.html.htm">This genius photo experiment shows we are all just sheeple in the consumer matrix</a>
                                            </h3>
                                            <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                                <span class="post-on">26 August 2020</span>
                                                <span class="hit-count has-dot">18k Views</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($newsHot as $news)
                    <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.2s">
                        <div class="post-card-1 border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url({{url('assets/imgs/news/news-1.jpg')}})">
                                <a class="img-link" href="{{route('clients.community.show', [$community->id])}}"></a>
                                <span class="top-right-icon bg-success"><i class="elegant-icon icon_camera_alt"></i></span>
                                <ul class="social-share">
                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                </ul>
                            </div>
                            <div class="post-content p-30">
                                <div class="entry-meta meta-0 font-small mb-10">
                                    <a href="{{route('clients.community.show', [$community->id])}}"><span class="post-cat text-info">{{$community->name}}</span></a>
{{--                                    <a href="category.html.htm"><span class="post-cat text-success">Food</span></a>--}}
                                </div>
                                <div class="d-flex post-card-content">
                                    <h5 class="post-title mb-20 font-weight-900">
                                        <a href="{{route('clients.news.show', [$news->id])}}">{{$news->title}}</a>
                                    </h5>
                                    <div class="post-excerpt mb-25 font-small text-muted">
                                        <p>{{$news->description}}</p>
                                    </div>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on">{{$news->created_at}}</span>
                                        <span class="time-reading has-dot">12 mins read</span>
                                        <span class="post-by has-dot">23k views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
{{--                    <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated">--}}
{{--                        <div class="post-card-1 border-radius-10 hover-up">--}}
{{--                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-2.jpg)">--}}
{{--                                <a class="img-link" href="single.html.htm"></a>--}}
{{--                                <ul class="social-share">--}}
{{--                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>--}}
{{--                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>--}}
{{--                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>--}}
{{--                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="post-content p-30">--}}
{{--                                <div class="entry-meta meta-0 font-small mb-10">--}}
{{--                                    <a href="category.html.htm"><span class="post-cat text-warning">Fashion</span></a>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex post-card-content">--}}
{{--                                    <h5 class="post-title mb-20 font-weight-900">--}}
{{--                                        <a href="single.html.htm">Put Yourself in Your Customers Shoes</a>--}}
{{--                                    </h5>--}}
{{--                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">--}}
{{--                                        <span class="post-on">17 July</span>--}}
{{--                                        <span class="time-reading has-dot">8 mins read</span>--}}
{{--                                        <span class="post-by has-dot">12k views</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                    <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.2s">--}}
{{--                        <div class="post-card-1 border-radius-10 hover-up">--}}
{{--                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-3.jpg)">--}}
{{--                                <a class="img-link" href="single.html.htm"></a>--}}
{{--                                <ul class="social-share">--}}
{{--                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>--}}
{{--                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>--}}
{{--                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>--}}
{{--                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="post-content p-30">--}}
{{--                                <div class="entry-meta meta-0 font-small mb-10">--}}
{{--                                    <a href="category.html.htm"><span class="post-cat text-danger">Travel</span></a>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex post-card-content">--}}
{{--                                    <h5 class="post-title mb-20 font-weight-900">--}}
{{--                                        <a href="single.html.htm">Life and Death in the Empire of the Tiger</a>--}}
{{--                                    </h5>--}}
{{--                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">--}}
{{--                                        <span class="post-on">7 August</span>--}}
{{--                                        <span class="time-reading has-dot">15 mins read</span>--}}
{{--                                        <span class="post-by has-dot">500 views</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                    <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.4s">--}}
{{--                        <div class="post-card-1 border-radius-10 hover-up">--}}
{{--                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-4.jpg)">--}}
{{--                                <a class="img-link" href="single.html.htm"></a>--}}
{{--                                <span class="top-right-icon bg-info"><i class="elegant-icon icon_headphones"></i></span>--}}
{{--                                <ul class="social-share">--}}
{{--                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>--}}
{{--                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>--}}
{{--                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>--}}
{{--                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="post-content p-30">--}}
{{--                                <div class="entry-meta meta-0 font-small mb-10">--}}
{{--                                    <a href="category.html.htm"><span class="post-cat text-success">Lifestyle</span></a>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex post-card-content">--}}
{{--                                    <h5 class="post-title mb-20 font-weight-900">--}}
{{--                                        <a href="single.html.htm">When Two Wheels Are Better Than Four</a>--}}
{{--                                    </h5>--}}
{{--                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">--}}
{{--                                        <span class="post-on">15 Jun</span>--}}
{{--                                        <span class="time-reading has-dot">9 mins read</span>--}}
{{--                                        <span class="post-by has-dot">1.2k views</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                    <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated">--}}
{{--                        <div class="post-card-1 border-radius-10 hover-up">--}}
{{--                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-5.jpg)">--}}
{{--                                <a class="img-link" href="single.html.htm"></a>--}}
{{--                                <ul class="social-share">--}}
{{--                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>--}}
{{--                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>--}}
{{--                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>--}}
{{--                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="post-content p-30">--}}
{{--                                <div class="entry-meta meta-0 font-small mb-10">--}}
{{--                                    <a href="category.html.htm"><span class="post-cat text-warning">Fashion</span></a>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex post-card-content">--}}
{{--                                    <h5 class="post-title mb-20 font-weight-900">--}}
{{--                                        <a href="single.html.htm">The Life of a Travel Writer with David Farley</a>--}}
{{--                                    </h5>--}}
{{--                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">--}}
{{--                                        <span class="post-on">17 July</span>--}}
{{--                                        <span class="time-reading has-dot">8 mins read</span>--}}
{{--                                        <span class="post-by has-dot">12k views</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                    <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.2s">--}}
{{--                        <div class="post-card-1 border-radius-10 hover-up">--}}
{{--                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-6.jpg)">--}}
{{--                                <a class="img-link" href="single.html.htm"></a>--}}
{{--                                <ul class="social-share">--}}
{{--                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>--}}
{{--                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>--}}
{{--                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>--}}
{{--                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="post-content p-30">--}}
{{--                                <div class="entry-meta meta-0 font-small mb-10">--}}
{{--                                    <a href="category.html.htm"><span class="post-cat text-danger">Travel</span></a>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex post-card-content">--}}
{{--                                    <h5 class="post-title mb-20 font-weight-900">--}}
{{--                                        <a href="single.html.htm">The 22 Best Things to See and Do in Bangkok</a>--}}
{{--                                    </h5>--}}
{{--                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">--}}
{{--                                        <span class="post-on">7 August</span>--}}
{{--                                        <span class="time-reading has-dot">15 mins read</span>--}}
{{--                                        <span class="post-by has-dot">500 views</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                    <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.4s">--}}
{{--                        <div class="post-card-1 border-radius-10 hover-up">--}}
{{--                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-7.jpg)">--}}
{{--                                <a class="img-link" href="single.html.htm"></a>--}}
{{--                                <ul class="social-share">--}}
{{--                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>--}}
{{--                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>--}}
{{--                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>--}}
{{--                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="post-content p-30">--}}
{{--                                <div class="entry-meta meta-0 font-small mb-10">--}}
{{--                                    <a href="category.html.htm"><span class="post-cat text-success">Lifestyle</span></a>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex post-card-content">--}}
{{--                                    <h5 class="post-title mb-20 font-weight-900">--}}
{{--                                        <a href="single.html.htm">Why Don’t More Black American Women Travel Solo?</a>--}}
{{--                                    </h5>--}}
{{--                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">--}}
{{--                                        <span class="post-on">15 Jun</span>--}}
{{--                                        <span class="time-reading has-dot">9 mins read</span>--}}
{{--                                        <span class="post-by has-dot">1.2k views</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                    <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated">--}}
{{--                        <div class="post-card-1 border-radius-10 hover-up">--}}
{{--                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-8.jpg)">--}}
{{--                                <a class="img-link" href="single.html.htm"></a>--}}
{{--                                <ul class="social-share">--}}
{{--                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>--}}
{{--                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>--}}
{{--                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>--}}
{{--                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="post-content p-30">--}}
{{--                                <div class="entry-meta meta-0 font-small mb-10">--}}
{{--                                    <a href="category.html.htm"><span class="post-cat text-warning">Fashion</span></a>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex post-card-content">--}}
{{--                                    <h5 class="post-title mb-20 font-weight-900">--}}
{{--                                        <a href="single.html.htm">My 8 Favorite Hostels in San José, Costa Rica</a>--}}
{{--                                    </h5>--}}
{{--                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">--}}
{{--                                        <span class="post-on">17 July</span>--}}
{{--                                        <span class="time-reading has-dot">8 mins read</span>--}}
{{--                                        <span class="post-by has-dot">12k views</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                    <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.2s">--}}
{{--                        <div class="post-card-1 border-radius-10 hover-up">--}}
{{--                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-9.jpg)">--}}
{{--                                <a class="img-link" href="single.html.htm"></a>--}}
{{--                                <ul class="social-share">--}}
{{--                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>--}}
{{--                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>--}}
{{--                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>--}}
{{--                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="post-content p-30">--}}
{{--                                <div class="entry-meta meta-0 font-small mb-10">--}}
{{--                                    <a href="category.html.htm"><span class="post-cat text-danger">Travel</span></a>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex post-card-content">--}}
{{--                                    <h5 class="post-title mb-20 font-weight-900">--}}
{{--                                        <a href="single.html.htm">The Nomadic Network: A Community Update & More Events</a>--}}
{{--                                    </h5>--}}
{{--                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">--}}
{{--                                        <span class="post-on">7 August</span>--}}
{{--                                        <span class="time-reading has-dot">15 mins read</span>--}}
{{--                                        <span class="post-by has-dot">500 views</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                    <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.4s">--}}
{{--                        <div class="post-card-1 border-radius-10 hover-up">--}}
{{--                            <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url(assets/imgs/news/news-11.jpg)">--}}
{{--                                <a class="img-link" href="single.html.htm"></a>--}}
{{--                                <span class="top-right-icon bg-info"><i class="elegant-icon icon_headphones"></i></span>--}}
{{--                                <ul class="social-share">--}}
{{--                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>--}}
{{--                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>--}}
{{--                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>--}}
{{--                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="post-content p-30">--}}
{{--                                <div class="entry-meta meta-0 font-small mb-10">--}}
{{--                                    <a href="category.html.htm"><span class="post-cat text-success">Lifestyle</span></a>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex post-card-content">--}}
{{--                                    <h5 class="post-title mb-20 font-weight-900">--}}
{{--                                        <a href="single.html.htm">We’ve Updated Our Travel Hacking Guide</a>--}}
{{--                                    </h5>--}}
{{--                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">--}}
{{--                                        <span class="post-on">15 Jun</span>--}}
{{--                                        <span class="time-reading has-dot">9 mins read</span>--}}
{{--                                        <span class="post-by has-dot">1.2k views</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}
                </div>
                {!! $newsHot->links() !!}
            </div>
        </div>
    </main>
@endsection
