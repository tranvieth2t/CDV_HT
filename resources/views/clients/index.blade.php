@extends('clients.layouts.app')

@section('content')
    @include('clients.home.banner')
    @include('clients.home.community_CDVHT',['news' => $listHotNewsParentCommunity])
    @include('clients.home.community_child' ,['news' => $listHotNews])
    @include('clients.home.catholic')
    @include('clients.layouts.stile_bottom')
@endsection
