@extends('clients.layouts.app')

@section('content')
    @include('clients.home.banner', ['listBanner' => $listBanner])
    @include('clients.home.notify', ['listNotify' => $listNotify])
    @include('clients.home.community_CDVHT',['news' => $listHotNewsParentCommunity])
    @include('clients.home.community_child' ,['news' => $listNewHotChildCommunity])
{{--    @include('clients.home.catholic', ['listNewsCatholic' => $listNewsCatholic])--}}
    @include('clients.home.vocation', ['listVocation' => $listVocation])
    @include('clients.home.couple', ['listCouple' => $listCouple])
    @include('clients.home.video')
{{--    @include('clients.layouts.stile_bottom')--}}

@endsection
