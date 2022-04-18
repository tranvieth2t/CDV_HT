@extends('clients.layouts.app')
@section('content')
    <main id="main">
        @include('clients.home.banner')
        @include('clients.inc.section')

    @include('clients.home.portfolio',[
            'listHotNews' => $listHotNews,
            ])
        @include('clients.home.teams')
        @include('clients.inc.contact')
    </main>
@endsection

