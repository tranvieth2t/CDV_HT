\<div class="bg-grey ">
    <div class="container">
        <div class="hot-tags pt-30 pb-30 font-small align-self-center">
            <div class="widget-header-3">
                <div class="row align-self-center">
                    <div class="col-md-4 align-self-center">
                        <h4 class="widget-title">Tin Cộng đoàn Thành Viên</h4>
                    </div>
                    <div class="col-md-8 text-md-right font-small align-self-center">
                        <a href="http://cdvht.something.test/community" class="d-inline-block mr-5 mb-0">
                            <i class="elegant-icon  icon_tag_alt mr-5 text-muted"></i> Xem thêm
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="post-module-2">
                    <div class="loop-list loop-list-style-1">
                        <div class="row">
                            @php($index = 0)
                            @for(; $index < 6; $index++)
                                <article class="grid-item col-lg-6 pb-50 wow fadeIn animated">
                                    <div class="post-card-1 border-radius-10 hover-up">
                                        <div class="post-thumb thumb-overlay img-hover-slide position-relative"
                                             style="background-image: url({{getDomainShowImage().$news[$index]->thumbnail}})">
                                            <a class="img-link"
                                               href="{{route('clients.news.show', $news[$index]->id)}}">
                                            </a>
                                            <span class="top-right-icon bg-success"><i
                                                        class="elegant-icon icon_camera_alt"></i></span>
                                            <ul class="social-share">
                                                <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                <li><a class="fb"
                                                       href="https://www.facebook.com/sharer.php?u={{route('clients.news.show', [$news[$index]->id])}}"
                                                       title="Share on Facebook" target="_blank"><i
                                                                class="elegant-icon social_facebook"></i></a></li>
                                                {{--                                                <li><a class="tw" href="#" target="_blank" title="Tweet now"><i--}}
                                                {{--                                                                class="elegant-icon social_twitter"></i></a></li>--}}
                                                {{--                                                <li><a class="pt" href="#" target="_blank" title="Pin it"><i--}}
                                                {{--                                                                class="elegant-icon social_pinterest"></i></a></li>--}}
                                            </ul>
                                        </div>
                                        <div class="post-content p-30">
                                            <div class="entry-meta meta-0 font-small mb-10">
                                                <a href="{{route('clients.community.show', [$news[$index]->community_id])}}">
                                                    <span class="post-cat"
                                                          style="color: {{$news[$index]->color}}">{{$news[$index]->name}}</span></a>
                                                {{--                        <a href="category.html.htm"><span class="post-cat text-success">Food</span></a>--}}
                                            </div>
                                            <div class="d-flex post-card-content">
                                                <h5 class="post-title mb-20 font-weight-900">
                                                    <a href=" {{route('clients.news.show', [$news[$index]->id])}} ">{{$news[$index]->title}}</a>
                                                </h5>
                                                <div class="post-excerpt mb-25 font-small text-muted">
                                                    <p>{{$news[$index]->description}}</p>
                                                </div>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">{{convertTimeDbToTimeString($news[$index]->created_at)}}</span>
                                                    {{--                                                    <span class="time-reading has-dot">12 mins read</span>--}}
                                                    {{--                                                    <span class="post-by has-dot">23k views</span>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-area">
                    <div class="sidebar-widget widget-latest-posts mb-30 wow fadeInUp animated">
                        <div class="post-block-list post-module-1">
                            <ul class="list-post">
                                @for(; $index < count($news); $index++)
                                    <li class="mb-10 wow fadeInUp animated">
                                        <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-15 text-limit-2-row font-medium"><a
                                                            href="{{route('clients.news.show', [$news[$index]->id])}}">{{$news[$index]->title}}
                                                    </a>
                                                </h6>
                                                <div class="entry-meta meta-1 float-left font-x-small ">
                                                    <span class="post-cat font-weight-bold"
                                                          style="color: {{$news[$index]->color}}">{{$news[$index]->name}}</span>
                                                    <span class="post-on text-uppercase">{{$news[$index]->created_at}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>