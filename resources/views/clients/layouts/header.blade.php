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
                        <li><a href="category-list.html.htm">Giới thiệu</a></li>
                        <li class=""><a href="">Thông báo</a></li>
{{--                        <li class="menu-item-has-children"><a href="category-grid.html.htm">Tin cộng đoàn</a></li>--}}
                        <li class=""><a href="{{route('clients.community.index')}}">Tin cộng đoàn</a>
                            <ul class="sub-menu font-small">
                                @php($listCommunity = getFullCommunity())
                                @foreach($listCommunity as $community)
                                <li><a href="{{route('clients.community.show', [$community->id])}}">{{$community->name}}</a></li>
                                    @endforeach

                            </ul>
                        </li>
                        <li class=""><a href="category-grid.html.htm">Tin Hội Thánh</a></li>
                        <li class=""><a href="category-grid.html.htm">Sự kiện</a></li>
                        <li><a href="category.html.htm">Cặp đôi cộng đoàn</a></li>
                        <li><a href="category.html.htm">Cuộc thi viết</a></li>
                    </ul>
                    <!--Mobile menu-->
                    <ul id="mobile-menu" class="d-block d-lg-none text-muted">
                        <li class="menu-item-has-children">
                            <a href="index.html.htm">Home</a>
                            <ul class="sub-menu text-muted font-small">
                                <li><a href="index.html.htm">Home default</a></li>
                                <li><a href="home-2.html.htm">Homepage 2</a></li>
                                <li><a href="home-3.html.htm">Homepage 3</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Pages</a>
                            <ul class="sub-menu font-small">
                                <li><a href="page-about.html.htm">About</a></li>
                                <li><a href="page-contact.html.htm">Contact</a></li>
                                <li><a href="page-typography.html.htm">Typography</a></li>
                                <li><a href="page-register.html.htm">Register</a></li>
                                <li><a href="page-login.html.htm">Login</a></li>
                                <li><a href="page-search.html.htm">Search</a></li>
                                <li><a href="page-author.html.htm">Author</a></li>
                                <li><a href="page-404.html.htm">404 page</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Category</a>
                            <ul class="sub-menu font-small">
                                <li><a href="category-list.html.htm">List layout</a></li>
                                <li><a href="category-grid.html.htm">Grid layout</a></li>
                                <li><a href="category-masonry.html.htm">Masonry layout</a></li>
                                <li><a href="category-big.html.htm">Big layout</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Single post</a>
                            <ul class="sub-menu font-small">
                                <li><a href="single.html.htm">Default</a></li>
                                <li><a href="single-2.html.htm">Big image</a></li>
                                <li><a href="single-3.html.htm">Left image</a></li>
                                <li><a href="single-4.html.htm">With sidebar</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="float-right header-tools text-muted font-small">
                <ul class="header-social-network d-inline-block list-inline mr-15">
                    <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i
                                class="elegant-icon social_facebook"></i></a></li>
                    <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i
                                class="elegant-icon social_twitter "></i></a></li>
                    <li class="list-inline-item"><a class="social-icon pt text-xs-center" target="_blank" href="#"><i
                                class="elegant-icon social_pinterest "></i></a></li>
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
