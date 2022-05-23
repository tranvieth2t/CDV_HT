@extends('clients.layouts.app')
@section('content')
    <main>
        <div class="archive-header pt-50 text-center pb-50">
            <div class="container">
                <h2 class="font-weight-900">Thông báo</h2>
            </div>
        </div>
        <div class="container">
            <div class="grid row mb-30">
                <div class="grid-sizer"></div>
                @foreach($listNotify as $notify)
                    <article class="grid-item col pb-50 wow fadeIn animated">
                        <div class="post-card-1 border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative"
                                 style="background-image: url({{getDomainShowImage().$notify->thumbnail}})">
                                <a class="img-link" href="{{ route('notify.show', [$notify->id]) }}"></a>
                                <ul class="social-share">
                                    <li><a href="#"><i class="fa-solid fa-share"></i></a></li>
                                    <li>
                                        <a class="fb"
                                           href="https://www.facebook.com/sharer.php?u={{route('clients.notify.show', [$notify->id])}}"
                                           title="Share on Facebook" target="_blank">
                                            <i class="fa-brands fa-facebook"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-content p-30">
                                <div class="entry-meta meta-0 font-small mb-15 d-flex justify-content-between">
                                    <a href="{{route('clients.community.show', [$notify->community_id])}}">
                                        <span class="post-cat">{{$notify->community->name}}</span></a>
                                    </a>
                                </div>
                                <div class="d-flex post-card-content">
                                    <h5 class="post-title mb-20 font-weight-900">
                                        <a href="{{ route('clients.notify.show', [$notify->id]) }}">{!! $notify->title !!}</a>
                                    </h5>
                                    <div class="meta-1 float-left ">
                                        <div class="post-excerpt mb-15 font-small text-muted">
                                            <p class="m-0">{{ $notify->description }}</p>
                                        </div>
                                        <div class="entry-meta meta-1 float-left font-x-small ">
                                            <span class="post-on">{{convertTimeDbToTimeString($notify->created_at)}}</span>
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
                        {!! $listNotify->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
@endpush
