@extends('clients.layouts.app')
@section('content')
    <main id="main">
        @include('clients.home.portfolio',[
    'listHotNews' => $listHotNews,
])
    </main><!-- End #main -->
@endsection

