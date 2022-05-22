<header class="main-header header-style-1 font-heading">
    <div class="header-sticky">
        <div class="container align-self-center">
            <div class="mobile_menu d-lg-none d-block"></div>
            <div class="main-nav d-none d-lg-block float-left">
                <nav>
                    <!--Desktop menu-->
                    <ul class="main-menu d-none d-lg-inline font-small">
                        <li class=" current-item">
                            <a href="{{route('home')}}">
                                <i class="elegant-icon icon_house_alt mr-5"></i> Trang chủ</a>
                        </li>
                        <li class=""><a href="">Thông báo</a></li>
{{--                        <li class="menu-item-has-children"><a href="{{route('home')}}">Tin cộng đoàn</a></li>--}}
                        <li class="menu-item-has-children"><a href="{{route('clients.community.show', [1])}}">Giới thiệu</a>
                            <ul class="sub-menu font-small">
                                @php($listCommunity = getFullCommunity())
                                @foreach($listCommunity as $community)
                                <li><a href="{{route('clients.community.show', [$community->id])}}">{{$community->name}}</a></li>
                                    @endforeach
                            </ul>
                        </li>
                        <li class=""><a href="{{route('home')}}">Tin Hội Thánh</a></li>
                        <li><a href="{{route('home')}}">Cặp đôi cộng đoàn</a></li>
                        <li><a href="{{route('home')}}">Cuộc thi viết</a></li>
                    </ul>
                    <!--Mobile menu-->
                    <ul id="mobile-menu" class="d-block d-lg-none text-muted">
                        <li class="menu-item-has-children">
                            <a href="{{route('home')}}">Trang chủ</a>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Giới thiệu</a>
                            <ul class="sub-menu font-small">
                                @foreach($listCommunity as $community)
                                    <li><a href="{{route('clients.community.show', [$community->id])}}">{{$community->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{route('home')}}">Tin Hội Thánh</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{route('home')}}">Cặp đôi cộng đoàn</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{route('home')}}">Cuộc thi viết</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="float-right header-tools text-muted font-small">
                <ul class="header-social-network d-inline-block list-inline mr-15">
                    <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="elegant-icon social_facebook"></i></a></li>
                    <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i class="elegant-icon social_twitter "></i></a></li>
                    <li class="list-inline-item"><a class="social-icon pt text-xs-center" target="_blank" href="#"><i class="elegant-icon social_pinterest "></i></a></li>
                </ul>
                <div class="off-canvas-toggle-cover d-inline-block">
                    <div class="off-canvas-toggle hidden d-inline-block" id="off-canvas-toggle">
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</header>