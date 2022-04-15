<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CDVHT</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('client/img/icon.png')}}" rel="icon">
    <link href="{{asset('client/img/icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('client/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('client/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('client/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('client/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('client/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('client/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('client/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Ninestars - v4.7.0
    * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
{{--            <h1 class="text-light"><a href="index.html">--}}
{{--                    <img >Ninestars--}}
{{--                    </a></h1>--}}
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="index.html"><img src="{{asset("client/img/logo.jpg")}}" alt="" class="img-fluid"></a>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Trang chủ</a></li>
                <li><a class="nav-link scrollto" href="#about">Tin cộng đoàn</a></li>
                <li><a class="nav-link scrollto" href="#services">Thông báo</a></li>
                <li class="dropdown"><a href="#"><span>Cộng đoàn Thành viên</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Cộng đoàn Don Bosco</a></li>
                        <li><a href="#">Cộng đoàn Mẹ Vô Nhiễm</a></li>
                        <li><a href="#">Cộng đoàn Đa Minh Savio</a></li>
                        <li><a href="#">Cộng đoàn Gioan Tông đồ</a></li>
                        <li><a href="#">Cộng đoàn Phanxico Xavie</a></li>
                        <li><a href="#">Cộng đoàn Anton Pauda</a></li>
                        <li><a href="#">Cộng đoàn Phanxico Assisi </a></li>
                        <li><a href="#">Cộng đoàn Cựu Sinh Viên và Gia Đình Công giáo</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#contact">Tâm sự - Chia sẻ</a></li>
                <li><a class="getstarted scrollto" href="#about">Đăng nhập</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1>Cộng đoàn giáo phận <br> Vinh - Hà Tĩnh tại Hà Nội</h1>
                <h2>Tâm linh - Tri thức - Nối kết</h2>
                <div>
                    <a href="#about" class="btn-get-started scrollto">Giới thiệu</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img">
                <img src="client/img/hero-img.svg" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row justify-content-between">
                <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
                    <img src="client/img/1.png" class="img-fluid" alt="" data-aos="zoom-in">
                </div>
                <div class="col-lg-6 pt-5 pt-lg-0">
                    <h3 data-aos="fade-up">"Đến bao giờ tôi mới tìm được phi công của tôi"</h3>
                    <p data-aos="fade-up" data-aos-delay="100">
                        Lan Anh - 23 tuổi chia sẻ với K13
                    </p>
                    <div class="row">
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-receipt"></i>
                            <h4>Corporis voluptates sit</h4>
                            <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-cube-alt"></i>
                            <h4>Ullamco laboris nisi</h4>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Services</h2>
                <p>Check out the great services we offer</p>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                            excepturi sint occaecati cupiditate</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                        <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat nulla</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4 class="title"><a href="">Magni Dolores</a></h4>
                        <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                            deserunt mollit anim</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4 class="title"><a href="">Nemo Enim</a></h4>
                        <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                            praesentium voluptatum</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Portfolio</h2>
                <p>Check out our beautifull portfolio</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-card">Card</li>
                        <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-3 col-md-4 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="client/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-links">
                            <a href="client/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>App</p>
                        </div>
                    </div>
                </div>







                <div class="col-lg-3 col-md-4 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="client/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                        <div class="portfolio-links">
                            <a href="client/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox" title="12312312312312331231231233123123 3"><i
                                    class="bi bi-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="client/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                        <div class="portfolio-links">
                            <a href="client/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox" title="App 2"><i class="bi bi-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>
                        <div class="portfolio-info">
                            <h4>App 2</h4>
                            <p>App</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="client/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                        <div class="portfolio-links">
                            <a href="client/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox" title="Card 2"><i class="bi bi-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>
                        <div class="portfolio-info">
                            <h4>Card 2</h4>
                            <p>Card</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="client/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                        <div class="portfolio-links">
                            <a href="client/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox" title="Web 2"><i class="bi bi-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>
                        <div class="portfolio-info">
                            <h4>Web 2</h4>
                            <p>Web</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="client/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                        <div class="portfolio-links">
                            <a href="client/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox" title="App 3"><i class="bi bi-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>
                        <div class="portfolio-info">
                            <h4>App 3</h4>
                            <p>App</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="client/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                        <div class="portfolio-links">
                            <a href="client/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox" title="Card 1"><i class="bi bi-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>
                        <div class="portfolio-info">
                            <h4>Card 1</h4>
                            <p>Card</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="client/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                        <div class="portfolio-links">
                            <a href="client/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox" title="Card 3"><i class="bi bi-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>
                        <div class="portfolio-info">
                            <h4>Card 3</h4>
                            <p>Card</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="client/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                        <div class="portfolio-links">
                            <a href="client/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
                            <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                        </div>
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>F.A.Q</h2>
                <p>Frequently Asked Questions</p>
            </div>

            <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">

                <li>
                    <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Non consectetur a erat nam at
                        lectus urna duis? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non
                            curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Feugiat scelerisque varius
                        morbi enim nunc faucibus a pellentesque? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit
                            laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium.
                            Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa
                            tincidunt dui.
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Dolor sit amet consectetur
                        adipiscing elit pellentesque habitant morbi? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar
                            elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus
                            pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at
                            elementum eu facilisis sed odio morbi quis
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ac odio tempor orci dapibus.
                        Aliquam eleifend mi in nulla? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit
                            laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium.
                            Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa
                            tincidunt dui.
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Tempus quam pellentesque nec
                        nam aliquam sem et tortor consequat? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est
                            ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing
                            bibendum est. Purus gravida quis blandit turpis cursus in
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Tortor vitae purus faucibus
                        ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i
                            class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer
                            malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem
                            dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat
                            commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non
                            blandit massa enim nec.
                        </p>
                    </div>
                </li>

            </ul>

        </div>
    </section><!-- End F.A.Q Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Team</h2>
                <p>Our team is always here to help</p>
            </div>

            <div class="row">

                <div class="col-xl-3 col-lg-3 col-md-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="member">
                        <img src="client/img/team/team-1.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="member">
                        <img src="client/img/team/team-2.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="member">
                        <img src="client/img/team/team-3.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4" data-aos="zoom-in" data-aos-delay="400">
                    <div class="member">
                        <img src="client/img/team/team-4.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Amanda Jepson</h4>
                                <span>Accountant</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Team Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Clients</h2>
                <p>They trusted us</p>
            </div>

            <div class="clients-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="client/img/clients/client-1.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="client/img/clients/client-2.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="client/img/clients/client-3.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="client/img/clients/client-4.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="client/img/clients/client-5.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="client/img/clients/client-6.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="client/img/clients/client-7.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="client/img/clients/client-8.png" class="img-fluid" alt=""></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Clients Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact Us</h2>
                <p>Contact us the get started</p>
            </div>

            <div class="row">

                <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55s</p>
                        </div>

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                            frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>

                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Your Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                       required>
                            </div>
                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                <label for="name">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="name">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                   required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="name">Message</label>
                            <textarea class="form-control" name="message" rows="10" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center">
                            <button type="submit">Send Message</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Us Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h4>Join Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Ninestars</h3>
                    <p>
                        A108 Adam Street <br>
                        New York, NY 535022<br>
                        United States <br><br>
                        <strong>Phone:</strong> +1 5589 55488 55<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Social Networks</h4>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="copyright">
            &copy; Copyright <strong><span>Ninestars</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('client/vendor/aos/aos.js')}}"></script>
<script src="{{asset('client/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('client/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('client/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('client/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('client/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('client/js/main.js')}}"></script>

</body>

</html>
