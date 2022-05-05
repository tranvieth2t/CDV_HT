@extends('clients.layouts.app')
@section('content')

<div class="container single-content">
    <div class="entry-header pt-80 pb-30 mb-20">
        <div class="row">
            <div class="col-md-8 mb-md-0 mb-sm-3">
                <figure class="mb-0 mt-lg-0 mt-3 border-radius-5">
                    <div class="carausel-post-1 hover-up border-radius-10 overflow-hidden transition-normal position-relative wow fadeInUp animated">
                        <div class="arrow-cover"></div>
                        <div class="slide-fade">
                            @php($index = 0)
                            @for(; 6 > $index; $index++)

                                <div class="position-relative post-thumb">
                                    <div class="thumb-overlay img-hover-slide position-relative"
                                         style="background-image:{{url('assets/imgs/news/news-'.$index.'.jpg)')}}">
                                        <a class="img-link" href="single.html.htm"></a>
                                        <span class="top-left-icon bg-warning"><i
                                                    class="elegant-icon icon_star_alt"></i></span>
                                        <div class="post-content-overlay text-white p-30">
                                            <div class="entry-meta meta-0 font-small mb-20">
                                                <a href=""><span
                                                            class="post-cat text-info text-uppercase"></span></a>
                                                <a href="category.html.htm"><span
                                                            class="post-cat text-success text-uppercase">Animal</span></a>
                                            </div>
                                            <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                                <span class="post-on">20 minutes ago</span>
                                                <span class="hit-count has-dot">23k Views</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </figure>
            </div>
            <div class="col-md-4 ">
                <div class="post-content">
                    <h2 class="entry-title mb-30 font-weight-900">
                        <a href="{{route('clients.news.show', [$news->id])}}"> {{$news->title}} </a>
                    </h2>
                    <p class="excerpt mb-30">
                        {!! $news->description !!}
                    </p>
                    <div class="entry-meta align-items-center meta-2 font-small color-muted">
                        <a href="{{route('clients.community.show', [$news->community_id])}}"><span
                                    class="post-cat position-relative text-info">{{$news->community->name}}</span></a>
                        <span class="mr-10"> {{convertTimeDbToTimeString($news->created_at)}}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <article class="entry-wraper mb-50">
        {!! $news->content !!}
    </article>
</div>
@endsection


