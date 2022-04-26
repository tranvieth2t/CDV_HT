@extends('clients.layouts.app')

@section('content')
    @include('clients.home.banner')
    @include('clients.home.community_CDVHT',['listHotNewsParentCommunity' => $listHotNewsParentCommunity])
    @include('clients.home.community_child' ,['listNewsChild' => $listHotNews])
    @include('clients.layouts.stile_bottom')
@endsection
