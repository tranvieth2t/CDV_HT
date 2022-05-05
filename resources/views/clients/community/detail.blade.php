@extends('clients.layouts.app')
@section('content')
    <main>
        <!--archive header-->
        <div class="archive-header pt-50 text-center">
            <div class="container">
                <h2 class="font-weight-900">{{$community->name}}</h2>
                <div >
                    {{$community->description}}
                </div>
                <div class="bt-1 border-color-1 mt-30 mb-50">
                    {!! $community->content !!}
                </div>
            </div>
        </div>
    </main>
@endsection
