@extends('clients.layouts.app')

@section('content')
    @include('clients.home.banner', ['listBanner' => $listBanner])
    @include('clients.home.notify', ['listNotify' => $listNotify])
    @include('clients.home.community_CDVHT',['news' => $listHotNewsParentCommunity])
    @include('clients.home.community_child' ,['news' => $listHotNews])
    @include('clients.home.catholic')
    @include('clients.home.video')
    @include('clients.layouts.stile_bottom')
@endsection
