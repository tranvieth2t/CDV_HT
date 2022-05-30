@extends('clients.layouts.app')
@section('content')

    <main class="bg-grey pb-30 pt-30">
        <div class="container single-content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content2">
                        <div class="entry-header entry-header-style-1 mb-50">
                            <h1 class="entry-title mb-30 font-weight-900">
                                <div>Anh {{$couple->male}} & Chị {{$couple->female}}</div>
                            </h1>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="entry-meta align-items-center meta-2 font-small color-muted">
                                        <p class="mb-5">
                                            <span class="author-name font-weight-bold">{{$couple->communityMale->name ?? "Khác"}} & {{$couple->communityFemale->name ?? "Khác"}}</span>
                                        </p>
                                        <span class="mr-10">{{convertTimeDbToTimeStringDate($couple->date_wedding)}}</span>
                                    </div>
                                </div>
                                <div class="col-md-3 text-right d-none d-md-inline">
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
                        <figure class="image mb-30 m-auto text-center border-radius-10">
                            <img class="border-radius-10" src="{{getDomainShowImage().$couple->thumbnail}}"
                                 alt="post-title">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-4 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        <div class="sidebar-widget widget-about mb-50 pt-30 pr-30 pb-30 pl-30 bg-white border-radius-5 has-border  wow fadeInUp animated">
                            {{--                            <img class="about-author-img mb-25" src="assets/imgs/authors/author-1.jpg" alt="">--}}
                            <h5 class="mb-20">Anh {{$couple->male}} & Chị {{$couple->female}}</h5>
                            <p class="font-medium text-muted">{{$couple->description}}</p>
                        </div>
                        <div class="sidebar-widget widget-latest-posts mb-50 wow fadeInUp animated">
                            <div class="widget-header-1 position-relative mb-30">
                                <h5 class="mt-5 mb-30">Bài viết liên quan</h5>
                            </div>
                            <div class="post-block-list post-module-1">
                                <ul class="list-post">
                                    @foreach($listCoupleHot as $couple)
                                        <li class="mb-30 wow fadeInUp animated">
                                            <div class="d-flex bg-white has-border p-25 hover-up transition-normal border-radius-5">
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-15 text-limit-3-row font-medium"><a
                                                                href="{{ route('clients.couple.show', [$couple->id]) }}">
                                                            Anh {{$couple->male}} & Chị {{$couple->female}}
                                                        </a></h6>
                                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                        <span class="post-on">{{convertTimeDbToTimeStringDate($couple->created_at)}}</span>
                                                        {{--                                                    <span class="post-by has-dot">150 views</span>--}}
                                                    </div>
                                                </div>
                                                <div class="post-thumb post-thumb-80 d-flex ml-15 border-radius-5 img-hover-scale overflow-hidden">
                                                    <a class="color-white" href="single.html.htm">
                                                        <img src="{{getDomainShowImage().$couple->thumbnail}}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

