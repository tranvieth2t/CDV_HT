<section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Các hoạt động của Cộng đoàn</h2>
            <p class="px-5 px-md-2 px-sm-2">Trải qua gần 13 năm hoạt động, Cộng đoàn ngày càng phát triển về số lượng và
                chất lượng thành viên cũng như các hoạt động của mình. Tôn chỉ hoạt động của Cộng đoàn Vinh - Hà Tĩnh
                dựa trên ba tiêu chí: Tâm linh – Tri thức – Nối kết. </p>
        </div>

        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
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
                    <li data-filter=".filter-12">Ca đoàn</li>
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
                            <h4>{{$news->title}}</h4>
                            <p>{{$news->description}}</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-{{$index}}.jpg" data-gall="portfolioGallery"
                                   class="venobox" title="{{$news->title}}"><i class="bx bx-plus"></i></a>
                                <a href="{{route('clients.community.show', [$news->id % 10])}}" data-gall="portfolioDetailsGallery"
                                   data-vbtype="iframe" class="venobox" title="Portfolio Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
