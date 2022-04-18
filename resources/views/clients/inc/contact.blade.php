<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Thông tin liên hệ</h2>
        </div>
        <div class="row mt-1">
            <div class="col-lg-4">
                <div class="info">
                    <div class="address">
                        <i class="bx bxl-facebook"></i>
                        <h4>Facebook:</h4>
                        <a target="_blank" href="{{$community->facebook ?? config('link.facebook')}}">
                            <p>Link</p>
                        </a>
                    </div>

                    <div class="email">
                        <i class="bx bxl-instagram-alt"></i>
                        <h4>Instagram:</h4>
                        <a target="_blank" href="{{$community->instagram ?? config('link.instagram')}}">
                            <p>Link</p>
                        </a>
                    </div>

                    <div class="youtube">
                        <i class="bx bxl-youtube"></i>
                        <h4>Youtube</h4>
                        <a target="_blank" href="{{$community->youtube ?? config('link.youtube')}}">
                            <p>Link</p>
                        </a>
                    </div>

                    <div class="phone">
                        <i class="bx bx-phone-call"></i>
                        <h4>Điện thoại</h4>
                        <a href="tel:{{$community->tel ?? config('link.tel')}}">
                            <p>Link</p>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-lg-8 mt-5 mt-lg-0 info">
                <div class="address">
                    <i class="bx bx-current-location"></i>
                    <h4 >Địa điểm sinh hoạt</h4>
                    <p class="pb-3">{{$community->map_name ?? config('link.map_name')}}</p>
                    <div class="" style="max-height: 290px; overflow: hidden">
                        {!! $community->iframe_map ?? config('link.iframe_map')!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Contact Section -->
