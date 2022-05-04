<div class="container">
    <div class="hot-tags pt-30 pb-30 font-small align-self-center">
        <div class="widget-header-3">
            <div class="row align-self-center">
                <div class="col-md-4 align-self-center">
                    <h4 class="widget-title">Tin cộng đoàn lớn</h4>
                </div>
                <div class="col-md-8 text-md-right font-small align-self-center">
                    <a href="{{route('clients.community.show', [$news[0]->community_id])}}"
                       class="d-inline-block mr-5 mb-0">
                        <i class="elegant-icon  icon_tag_alt mr-5 text-muted"></i>Xem thêm
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="loop-grid mb-30">
        <div class="row">
            <div class="col-lg-8 mb-30">
                <div class="carausel-post-1 hover-up border-radius-10 overflow-hidden transition-normal position-relative wow fadeInUp animated">
                    <div class="arrow-cover"></div>
                    <div class="slide-fade">
                        @php($index = 0)
                        @for(; count($news) - 7 > $index; $index++)
                            <div class="position-relative post-thumb">
                                <div class="thumb-overlay img-hover-slide position-relative"
                                     style="background-image: url({{getDomainShowImage().$news[$index]->thumbnail}})">
                                    <a class="img-link" href="{{route('clients.news.show', [$news[$index]->id])}}"></a>
                                    <span class="top-left-icon bg-warning">
                                        {!! config('constants.icon_tag')[$news[$index]->tag] !!}
                                    </span>
                                    <div class="post-content-overlay text-white p-30">
                                        <div class="entry-meta meta-0 font-small mb-15">
                                            <a href="{{route('clients.community.show', [$news[$index]->community_id])}}"><span
                                                        class="post-cat text-info ">{{$news[$index]->community->name}}</span></a>
                                            <a href="category.html.htm"><span
                                                        class="post-cat  "
                                                        style="color: {{config('constants.color_tag')[$news[$index]->tag]}}">{{__('enums.news_tag')[$news[$index]->tag] ?? 'Khác'}}</span></a>
                                        </div>
                                        <h3 class="post-title font-weight-600 mb-15">
                                            <a class="text-white"
                                               href="{{route('clients.news.show', [$news[$index]->id])}}">{{$news[$index]->title}}</a>
                                        </h3>
                                        <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                            <span class="post-on">{{convertTimeDbToTimeString($news[$index]->created_at)}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-area">
                    <div class="sidebar-widget widget-latest-posts mb-30 wow fadeInUp animated">
                        <div class="post-block-list post-module-1">
                            <ul class="list-post">
                                @for(; $index < count($news) - 3; $index++)
                                    <li class="mb-15 wow fadeInUp animated">
                                        <div class="d-flex bg-white has-border p-15 hover-up transition-normal border-radius-5">
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-15 text-limit-2-row font-medium"><a
                                                            href="{{route('clients.news.show', [$news[$index]->id])}}">{{$news[$index]->title}}
                                                    </a>
                                                </h6>
                                                <div class="entry-meta meta-1 float-left font-x-small ">
                                                    <span class="post-cat font-weight-bold"
                                                          style="color: {{$news[$index]->community->color}}">
                                                        {{$news[$index]->community->name}}</span>
                                                    <span class="post-cat  "
                                                          style="color: {{config('constants.color_tag')[$news[$index]->tag]}}">{{__('enums.news_tag')[$news[$index]->tag] ?? 'Khác'}}</span>
                                                    <span class="post-on ">{{convertTimeDbToTimeString($news[$index]->created_at)}}</span>
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
            @for(; count($news) > $index; $index++)
                <article class="col-lg-4 col-md-6 mb-30 wow fadeInUp animated" data-wow-delay="0.2s">
                    <div class="post-card-1 border-radius-10 hover-up">
                        <div class="post-thumb thumb-overlay img-hover-slide position-relative"
                             style="background-image: url({{getDomainShowImage().$news[$index]->thumbnail}})">
                            <a class="img-link" href="{{route('clients.news.show', [$news[$index]->id])}}"></a>
                            <span class="top-right-icon"
                                  style="background-color: {{config('constants.color_tag')[$news[$index]->tag]}}">{!! config('constants.icon_tag')[$news[$index]->tag] !!}</span>
                            <ul class="social-share">
                                <li><a href="#"><i class="fa-solid fa-share"></i></a></li>
                                <li><a class="fb"
                                       href="https://www.facebook.com/sharer.php?display=page&u={{route('clients.news.show', [$news[$index]->id])}}"
                                       title="Share on Facebook" target="_blank">
                                        <i class="fa-brands fa-facebook"></i></a></li>
                            </ul>
                        </div>
                        <div class="post-content p-30">
                            <div class="entry-meta meta-0 font-small mb-15 d-flex justify-content-between">
                                <a href="{{route('clients.community.show', [$news[$index]->community_id])}}">
                                                    <span class="post-cat"
                                                          style="color: {{$news[$index]->community->color}}">{{$news[$index]->community->name}}</span></a>
                                <a href="category.html.htm"><span
                                            class="post-cat"
                                            style="color: {{config('constants.color_tag')[$news[$index]->tag]}}">
                                                        {{__('enums.news_tag')[$news[$index]->tag] ?? 'Khác'}}
                                                    </span></a>
                            </div>
                            <div class="d-flex post-card-content">
                                <h6 class="post-title mb-15 font-weight-600 text-justify">
                                    <a href="{{route('clients.news.show', [$news[$index]->id])}}">{{$news[$index]->title}}</a>
                                </h6>
                                <div class="post-excerpt mb-15 font-small text-muted">
                                    <p class="m-0">{{$news[$index]->description}}</p>
                                </div>
                                <div class="entry-meta meta-1 float-left font-x-small ">
                                    <span class="post-on">{{convertTimeDbToTimeString($news[$index]->created_at)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endfor
        </div>
    </div>
</div>
