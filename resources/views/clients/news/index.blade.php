@extends('clients.layouts.app')
@section('content')
    <main>
        <div class="archive-header pt-50 text-center pb-50">
            <div class="container">
                <h2 class="font-weight-900">{{$listNews->first()->community->name}}</h2>
            </div>
        </div>
        <div class="container">
            <div class="grid row mb-30">
                <div class="grid-sizer"></div>
                @foreach($listNews as $news)
                    <article class="grid-item col pb-50 wow fadeIn animated">
                        <div class="post-card-1 border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative"
                                 style="background-image: url({{getDomainShowImage().$news->thumbnail}})">
                                <a class="img-link" href="{{ route('news.show', [$news->id]) }}"></a>
                                <span class="top-right-icon bg-success">{!! config('constants.icon_tag')[$news->tag] !!}</span>
                                <ul class="social-share">
                                    <li><a href="#"><i class="fa-solid fa-share"></i></a></li>
                                    <li>
                                        <a class="fb"
                                           href="https://www.facebook.com/sharer.php?u={{route('clients.news.show', [$news->id])}}"
                                           title="Share on Facebook" target="_blank">
                                            <i class="fa-brands fa-facebook"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-content p-30">
                                <div class="entry-meta meta-0 font-small mb-15 d-flex justify-content-between">
                                    <a href="{{route('clients.news.community', [$news->community_id])}}">
                                        <span class="post-cat">{{$news->community->name}}</span></a>
                                    <a href="{{route('home')}}"><span
                                                class="post-cat"
                                                style="color: {{config('constants.color_tag')[$news->tag]}}">
                                                        {{__('enums.news_tag')[$news->tag] ?? 'Kh??c'}}
                                                    </span>
                                    </a>
                                </div>
                                <div class="d-flex post-card-content">
                                    <h5 class="post-title mb-20 font-weight-900">
                                        <a href="{{ route('clients.news.show', [$news->id]) }}">{!! $news->title !!}</a>
                                    </h5>
                                    <div class="meta-1 float-left ">
                                        <div class="post-excerpt mb-15 font-small text-muted">
                                            <p class="m-0">{{ $news->description }}</p>
                                        </div>
                                        <div class="entry-meta meta-1 float-left font-x-small ">
                                            <span class="post-on">{{convertTimeDbToTimeString($news->created_at)}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="pagination-area mb-30 wow fadeInUp animated">
                        {!! $listNews->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
@endpush
