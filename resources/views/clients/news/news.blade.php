@extends('clients.layouts.app')
@section('content')
    <main class="bg-grey pb-30">

        <div class="container single-content">
            <div class="entry-header pt-80 pb-30 mb-20">
                <div class="row">
                    <div class="col-md-6 mb-md-0 mb-sm-3">
                        <figure class="mb-0 mt-lg-0 mt-3 border-radius-5">
                            <img class=" border-radius-5" src="{{asset('assets/imgs/news/news-8.jpg')}}" alt="">
                        </figure>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="post-content">
                            <div class="entry-meta meta-0 mb-15 font-small">
                                <a href="{{route('clients.news.show', [$news->id])}}"><span
                                        class="post-cat position-relative text-info">{{$news->community->name}}</span></a>
                                {{--                            <a href="category.html.htm"><span class="post-cat position-relative text-success">Food</span></a>--}}
                            </div>
                            <h1 class="entry-title mb-30 font-weight-900">
                                <a href="{{route('clients.news.show', [$news->id])}}"> {{$news->title}} </a>

                            </h1>
                            <p class="excerpt mb-30">
                                {!! $news->description !!}
                            </p>
                            <div class="entry-meta align-items-center meta-2 font-small color-muted">
                                <p class="mb-5">
                                    <a class="author-avatar" href="#"><img class="img-circle"
                                                                           src="{{asset('assets/imgs/news/news-8.jpg')}}"></a>
                                    By <a href="author.html"><span
                                            class="author-name font-weight-bold">Barbara Cartland</span></a>
                                </p>
                                <span class="mr-10"> {{$news->created_at}}</span>
                                <span class="has-dot"> 8 mins read</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--end single header-->
            <!--figure-->
            <article class="entry-wraper mb-50" >
                {!! $news->content !!}}
            </article>
        </div>
        <!--container-->
    </main>
@endsection

@push('scripts')
    <script !src="">

        // $(".swiper-wrapper").owlCarousel({
        //     slideSpeed: 300,
        //     paginationSpeed: 400,
        //     items: 1,
        //     autoplay: true,
        //     loop: true,
        //     dots:true
        // });
    </script>
@endpush
