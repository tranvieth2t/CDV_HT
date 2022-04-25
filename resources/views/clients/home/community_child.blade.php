<div class="bg-grey pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="post-module-2">
                    <div class="widget-header-1 position-relative mb-30  wow fadeInUp animated d-flex justify-content-between">
                        <h5 class="mt-5 mb-30">Tin cộng đoàn thành viên</h5>
                        <a href="" class="btn-success"><h5 >Xem thêm</h5></a>
                    </div>
                    <div class="loop-list loop-list-style-1">
                        <div class="row">
                            @foreach($listNewsChild as $news)
                                <article class="col-md-4 mb-40 wow fadeInUp  animated">
                                    <div class="post-card-1 border-radius-10 hover-up">
                                        <div class="post-thumb thumb-overlay img-hover-slide position-relative"
                                             style="background-image: url(assets/imgs/news/news-6.jpg)">
                                            <a class="img-link" href="{{route('clients.news.show',[$news->id])}}"></a>
                                            <ul class="social-share">
                                                <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i
                                                            class="elegant-icon social_facebook"></i></a></li>
                                                <li><a class="tw" href="#" target="_blank" title="Tweet now"><i
                                                            class="elegant-icon social_twitter"></i></a></li>
                                                <li><a class="pt" href="#" target="_blank" title="Pin it"><i
                                                            class="elegant-icon social_pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="post-content p-30">
                                            <div class="entry-meta meta-0 font-small mb-10">
                                                <a href="{{route('clients.community.show', [$news->community_id])}}"><span
                                                        class="post-cat text-info">{{$news->community->name}}</span></a>
{{--                                                <a href="category.html.htm"><span--}}
{{--                                                        class="post-cat text-success">Film</span></a>--}}
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
                        </div>
                    </div>
                </div>
                {{--                <div class="post-module-3">--}}
                {{--                    <div class="widget-header-1 position-relative mb-30">--}}
                {{--                        <h5 class="mt-5 mb-30">Tin cộng đoàn thành viên</h5>--}}
                {{--                    </div>--}}
                {{--                    <div class="loop-list loop-list-style-1">--}}
                {{--                        <article class="hover-up-2 transition-normal wow fadeInUp animated">--}}
                {{--                            <div class="row mb-40 list-style-2">--}}
                {{--                                <div class="col-md-4">--}}
                {{--                                    <div class="post-thumb position-relative border-radius-5">--}}
                {{--                                        <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url(assets/imgs/news/news-13.jpg)">--}}
                {{--                                            <a class="img-link" href="single.html.htm"></a>--}}
                {{--                                        </div>--}}
                {{--                                        <ul class="social-share">--}}
                {{--                                            <li><a href="#"><i class="elegant-icon social_share"></i></a></li>--}}
                {{--                                            <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>--}}
                {{--                                            <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>--}}
                {{--                                            <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>--}}
                {{--                                        </ul>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <div class="col-md-8 align-self-center">--}}
                {{--                                    <div class="post-content">--}}
                {{--                                        <div class="entry-meta meta-0 font-small mb-10">--}}
                {{--                                            <a href="{{route('clients.community.show', ['community' => $news->community_id])}}"><span class="post-cat text-primary">{{$news->community->name}}</span></a>--}}
                {{--                                        </div>--}}
                {{--                                        <h5 class="post-title font-weight-900 mb-20">--}}
                {{--                                            <a href="single.html.htm">{{$news->title}}</a>--}}
                {{--                                            <span class="post-format-icon"><i class="elegant-icon icon_star_alt"></i></span>--}}
                {{--                                        </h5>--}}
                {{--                                        <div class="entry-meta meta-1 float-left font-x-small text-uppercase">--}}
                {{--                                            <span class="post-on">7 August</span>--}}
                {{--                                            <span class="time-reading has-dot">11 mins read</span>--}}
                {{--                                            <span class="post-by has-dot">3k views</span>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </article>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
            {{--            <div class="col-lg-4">--}}
            {{--                <div class="widget-area">--}}
            {{--                    <div class="sidebar-widget widget-about mb-50 pt-30 pr-30 pb-30 pl-30 bg-white border-radius-5 has-border  wow fadeInUp animated">--}}
            {{--                        <img class="about-author-img mb-25" src="assets/imgs/authors/author.jpg" alt="">--}}
            {{--                        <h5 class="mb-20">Hello, I'm Steven</h5>--}}
            {{--                        <p class="font-medium text-muted">Hi, I’m Stenven, a Florida native, who left my career in corporate wealth management six years ago to embark on a summer of soul searching that would change the course of my life forever.</p>--}}
            {{--                        <strong>Follow me: </strong>--}}
            {{--                        <ul class="header-social-network d-inline-block list-inline color-white mb-20">--}}
            {{--                            <li class="list-inline-item"><a class="fb" href="#" target="_blank" title="Facebook"><i class="elegant-icon social_facebook"></i></a></li>--}}
            {{--                            <li class="list-inline-item"><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>--}}
            {{--                            <li class="list-inline-item"><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>--}}
            {{--                        </ul>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>
</div>
