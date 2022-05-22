@extends('clients.layouts.app')
@section('content')
    <main class="bg-grey pb-30 pt-30">
        <div class="container single-content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content2">
                        <div class="entry-header entry-header-style-1 mb-50">
                            <h1 class="entry-title mb-30 font-weight-900">
                                {!! $news->title !!}
                            </h1>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="entry-meta align-items-center meta-2 font-small color-muted">
                                        <p class="mb-5">
                                            By <a href="author.html"><span class="author-name font-weight-bold">{{$news->community->name}}</span></a>
                                        </p>
                                        <span class="mr-10">{{convertTimeDbToTimeString($news->created_at)}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right d-none d-md-inline">
                                    <ul class="header-social-network d-inline-block list-inline mr-15">
                                        <li class="list-inline-item text-muted"><span>Share this: </span></li>
                                        <li class="list-inline-item"><a class="social-icon fb text-xs-center"
                                                                        target="_blank" href="#"><i
                                                        class="elegant-icon social_facebook"></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon tw text-xs-center"
                                                                        target="_blank" href="#"><i
                                                        class="elegant-icon social_twitter "></i></a></li>
                                        <li class="list-inline-item"><a class="social-icon pt text-xs-center"
                                                                        target="_blank" href="#"><i
                                                        class="elegant-icon social_pinterest "></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--end single header-->
                        <figure class="image mb-30 m-auto text-center border-radius-10">
                            <img class="border-radius-10" src="{{getDomainShowImage().$news->thumbnail}}" alt="post-title">
                        </figure>
                        <!--figure-->
                        <article class="entry-wraper mb-50">
                            {!! $news->content !!}
                            <!--Comments-->
                            <div class="comments-area">
                                <div class="widget-header-2 position-relative mb-30">
                                    <h5 class=" widget-title mt-5 mb-30">Comments</h5>
                                </div>
                                <div class="comment-list wow fadeIn animated">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="{{asset('logo.jpg')}}" alt="">
                                            </div>
                                            <div class="desc">
                                                <p class="comment">
                                                    Vestibulum euismod, leo eget varius gravida, eros enim interdum
                                                    urna, non rutrum enim ante quis metus. Duis porta ornare nulla ut
                                                    bibendum
                                                </p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <h5>
                                                            <a href="#">Rosie</a>
                                                        </h5>
                                                        <p class="date">6 minutes ago </p>
                                                    </div>
                                                    <div class="reply-btn">
                                                        <a href="#" class="btn-reply">Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-list wow fadeIn animated">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="{{asset('logo.jpg')}}" alt="">
                                            </div>
                                            <div class="desc">
                                                <p class="comment">
                                                    Sed ac lorem felis. Ut in odio lorem. Quisque magna dui, maximus ut
                                                    commodo sed, vestibulum ac nibh. Aenean a tortor in sem tempus
                                                    auctor
                                                </p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <h5>
                                                            <a href="#">Agatha Christie</a>
                                                        </h5>
                                                        <p class="date">December 4, 2020 at 3:12 pm </p>
                                                    </div>
                                                    <div class="reply-btn">
                                                        <a href="#" class="btn-reply">Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-comment depth-2 justify-content-between d-flex mt-50">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="{{asset('logo.jpg')}}" alt="">
                                            </div>
                                            <div class="desc">
                                                <p class="comment">
                                                    Sed ac lorem felis. Ut in odio lorem. Quisque magna dui, maximus ut
                                                    commodo sed, vestibulum ac nibh. Aenean a tortor in sem tempus
                                                    auctor
                                                </p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <h5>
                                                            <a href="#">Steven</a>
                                                        </h5>
                                                        <p class="date">December 4, 2020 at 3:12 pm </p>
                                                    </div>
                                                    <div class="reply-btn">
                                                        <a href="#" class="btn-reply">Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-list wow fadeIn animated">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="{{asset('logo.jpg')}}" alt="">
                                            </div>
                                            <div class="desc">
                                                <p class="comment">
                                                    Donec in ullamcorper quam. Aenean vel nibh eu magna gravida
                                                    fermentum. Praesent eget nisi pulvinar, sollicitudin eros vitae,
                                                    tristique odio.
                                                </p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <h5>
                                                            <a href="#">Danielle Steel</a>
                                                        </h5>
                                                        <p class="date">December 4, 2020 at 3:12 pm </p>
                                                    </div>
                                                    <div class="reply-btn">
                                                        <a href="#" class="btn-reply">Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--comment form-->
                            <div class="comment-form wow fadeIn animated">
                                <div class="widget-header-2 position-relative mb-30">
                                    <h5 class="mt-5 mb-30">Leave a Reply</h5>
                                </div>
                                <form class="form-contact comment_form" action="#" id="commentForm">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100" name="comment" id="comment"
                                                          cols="30" rows="9" placeholder="Write Comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" name="name" id="name" type="text"
                                                       placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" name="email" id="email" type="email"
                                                       placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input class="form-control" name="website" id="website" type="text"
                                                       placeholder="Website">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn button button-contactForm">Post Comment
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-4 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        <div class="sidebar-widget widget-about mb-50 pt-30 pr-30 pb-30 pl-30 bg-white border-radius-5 has-border  wow fadeInUp animated">
{{--                            <img class="about-author-img mb-25" src="assets/imgs/authors/author-1.jpg" alt="">--}}
                            <h5 class="mb-20">{!!$news->title!!}</h5>
                            <p class="font-medium text-muted">{{$news->description}}</p>
                        </div>
                        <div class="sidebar-widget widget-latest-posts mb-50 wow fadeInUp animated">
                            <div class="widget-header-1 position-relative mb-30">
                                <h5 class="mt-5 mb-30">Bài viết liên quan</h5>
                            </div>
                            <div class="post-block-list post-module-1">
                                <ul class="list-post">
                                    <li class="mb-30 wow fadeInUp animated">
                                        <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-15 text-limit-2-row font-medium"><a
                                                            href="single.html.htm">Spending Some Quality Time with Kids?
                                                        It’s Possible</a></h6>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">05 August</span>
                                                    <span class="post-by has-dot">150 views</span>
                                                </div>
                                            </div>
                                            <div class="post-thumb post-thumb-80 d-flex ml-15 border-radius-5 img-hover-scale overflow-hidden">
                                                <a class="color-white" href="single.html.htm">
                                                    <img src="{{getDomainShowImage().$news->thumbnail}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
{{--                        <div class="sidebar-widget widget-latest-posts mb-50 wow fadeInUp animated">--}}
{{--                            <div class="widget-header-1 position-relative mb-30">--}}
{{--                                <h5 class="mt-5 mb-30">Last comments</h5>--}}
{{--                            </div>--}}
{{--                            <div class="post-block-list post-module-2">--}}
{{--                                <ul class="list-post">--}}
{{--                                    <li class="mb-30 wow fadeInUp animated">--}}
{{--                                        <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">--}}
{{--                                            <div class="post-thumb post-thumb-64 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">--}}
{{--                                                <a class="color-white" href="single.html.htm">--}}
{{--                                                    <img src="assets/imgs/authors/author-2.jpg" alt="">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <div class="post-content media-body">--}}
{{--                                                <p class="mb-10"><a href="author.html"><strong>David</strong></a>--}}
{{--                                                    <span class="ml-15 font-small text-muted has-dot">16 Jan 2020</span>--}}
{{--                                                </p>--}}
{{--                                                <p class="text-muted font-small">A writer is someone for whom writing is--}}
{{--                                                    more difficult than...</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="wow fadeInUp animated">--}}
{{--                                        <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">--}}
{{--                                            <div class="post-thumb post-thumb-64 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">--}}
{{--                                                <a class="color-white" href="single.html.htm">--}}
{{--                                                    <img src="assets/imgs/news/thumb-1.jpg" alt="">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <div class="post-content media-body">--}}
{{--                                                <p class="mb-10"><a href="author.html"><strong>Tsukasi</strong></a>--}}
{{--                                                    <span class="ml-15 font-small text-muted has-dot">18 May 2020</span>--}}
{{--                                                </p>--}}
{{--                                                <p class="text-muted font-small">Workwear bow detailing a slingback--}}
{{--                                                    buckle strap</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


