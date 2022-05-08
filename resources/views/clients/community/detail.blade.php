@extends('clients.layouts.app')
@section('content')
    <main class=" pb-30">
        <div class="container single-content">
            <div class="entry-header entry-header-style-1 mb-50 pt-50 text-center">
                <h1 class="entry-title mb-20 font-weight-900 ">
                    {{$community->name}}
                </h1>
                <p class="text-muted"><span class="typewrite d-inline" data-period="2000">
                        {{$community->description}}
                    </span></p>
            </div>
            <!--end single header-->
            <figure class="image mb-30 m-auto text-center border-radius-10">
                <img class="border-radius-10" src="{{getDomainShowImage().$community->thumbnail}}" alt="post-title">
            </figure>
            <!--figure-->
            <article class="entry-wraper">
                {!! $community->content !!}
            </article>
        </div>
        <!--container-->
    </main>
@endsection
