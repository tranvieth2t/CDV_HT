<div id="header-top" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <h1 class="text-light"><a href="{{route('home')}}"><span>Vinh Hà Tĩnh</span></a></h1>
        </div>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto " href="{{route('home')}}">Trang chủ</a></li>
                <li><a class="nav-link scrollto" href="#about">Tin cộng đoàn</a></li>
                @php($listCommunity = getFullCommunity())
                <li><a class="dropdown" href="{{route('clients.news.index')}}"> <span>Tin cộng đoàn</span> <i class="bi bi-chevron-down"></i></a>
{{--                    <ul>--}}
{{--                        @foreach($listCommunity  as $community)--}}
{{--                            <li><a href="{{route('clients.community.show', [$community->id])}}">{{$community->name}}</a></li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
                </li>
                @php($listCommunity = getFullCommunity())
                <li class="dropdown"><a href="#"><span>Cộng đoàn</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @foreach($listCommunity  as $community)
                        <li><a href="{{route('clients.community.show', [$community->id])}}">{{$community->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</div>
