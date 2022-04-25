<section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Các hoạt động của cộng đoàn</h2>
            <p class="px-5 px-md-2 px-sm-2"></p>
        </div>

        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">Tất cả</li>
                    <li data-filter=".filter-1">Vinh Hà Tĩnh</li>
                    <li data-filter=".filter-2">Don Bosco</li>
                    <li data-filter=".filter-3">Mẹ Vô Nhiễm</li>
                    <li data-filter=".filter-4">Gioan Tông Đồ</li>
                    <li data-filter=".filter-5">Đa Minh Savio</li>
                    <li data-filter=".filter-6">Phaolo Trở Lạ</li>
                    <li data-filter=".filter-7">Antôn Padua</li>
                    <li data-filter=".filter-8">Phanxico Assisi</li>
                    <li data-filter=".filter-9">Phanxico Xavie</li>
                    <li data-filter=".filter-10">Cựu SV & GĐCG</li>
                    <li data-filter=".filter-11">Que Diêm Sài Gòn</li>
                </ul>
            </div>
        </div>
        @php($index = 0)
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach($listHotNews as $news)
                <div class="col-lg-3 col-md-4 portfolio-item filter-{{$news->community_id}}">
                    <div class="portfolio-wrap">
                        @php($index++)
                        @php($index = $index %20 +1)
                        <img src="assets/img/portfolio/portfolio-{{$index}}.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h5>{{$news->community->name}}</h5>
                            <p>{{$news->title}}</p>
                            <div class="portfolio-links">
                                <a  href="{{route('clients.news.show', ['news' => $news->id])}}"
                                    title="Xem chi tiết"><i class="bx bx-bullseye"></i></a>
                                <a href="assets/img/portfolio/portfolio-{{$index}}.jpg" data-gall="portfolioGallery"
                                   class="venobox" title="Xem ảnh"><i class="bx bx-plus"></i></a>
                                <a href="{{route('clients.news.show', [$news->id])}}" data-gall="portfolioDetailsGallery"
                                   data-vbtype="iframe" class="venobox" title="Xem qua"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

