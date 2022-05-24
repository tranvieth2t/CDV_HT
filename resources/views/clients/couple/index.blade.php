@extends('clients.layouts.app')
@section('content')
    <section>
        <div class="archive-header pt-50 text-center pb-50">
            <div class="container">
                <h2 class="font-weight-900">{{__('message.admin.couple.couple')}}</h2>
            </div>
        </div>
        <div class="container">
            <div class="grid row mb-30">
                <div class="grid-sizer"></div>
                @foreach($listCouple as $couple)
                    <article class="grid-item col pb-50 wow fadeIn animated">
                        <div class="post-card-1 border-radius-10 hover-up">
                            <div class="post-thumb thumb-overlay img-hover-slide position-relative"
                                 style="background-image: url({{getDomainShowImage().$couple->thumbnail}})">
                                <a class="img-link" href="{{ route('couple.show', [$couple->id]) }}"></a>
                                <ul class="social-share">
                                    <li><a href="#"><i class="fa-solid fa-share"></i></a></li>
                                    <li>
                                        <a class="fb"
                                           href="https://www.facebook.com/sharer.php?u={{route('clients.couple.show', [$couple->id])}}"
                                           title="Share on Facebook" target="_blank">
                                            <i class="fa-brands fa-facebook"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-content p-30">
                                <div class="d-flex post-card-content">
                                    <h5 class="post-title mb-20 font-weight-900">
                                        <a href="{{ route('clients.couple.show', [$couple->id]) }}">
                                            Anh {{$couple->male}} & Chị {{$couple->female}}
                                        </a>
                                    </h5>
                                    <div class="meta-0 font-small mb-15 d-flex justify-content-between">
                                        <span class="post-cat">{{$couple->communityMale->name ?? "Khác"}} & {{$couple->communityFemale->name ?? "Khác"}}</span>
                                    </div>
                                    <div class="meta-1 float-left ">
                                        <div class="post-excerpt mb-15 font-small text-muted">
                                            <p class="m-0">{{ $couple->description }}</p>
                                        </div>
                                        <div class="entry-meta meta-1 float-left font-x-small ">
                                            <span class="post-on">Ngày cưới: {{convertTimeDbToTimeStringDate($couple->created_at)}}</span>
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
                        {!! $listCouple->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
@endpush
