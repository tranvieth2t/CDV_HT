<div id="banner">
    <div class="banner-carousel owl-carousel owl-theme">
        <div class="item"><img src="assets/img/1.jpg" alt="The Last of us"></div>
        <div class="item"><img src="assets/img/2.jpg" alt="GTA V"></div>
        <div class="item"><img src="assets/img/3.jpg" alt="Mirror Edge"></div>
        <div class="item"><img src="assets/img/4.jpg" alt="Mirror Edge"></div>
        <div class="item"><img src="assets/img/5.jpg" alt="Mirror Edge"></div>
        <div class="item"><img src="assets/img/6.jpg" alt="Mirror Edge"></div>
        <div class="item"><img src="assets/img/7.jpg" alt="Mirror Edge"></div>
    </div>
</div>

@push('scripts')
    <script !src="">
        $("#banner .banner-carousel").owlCarousel({
            slideSpeed: 300,
            paginationSpeed: 400,
            items: 1,
            autoplay: true,
            loop: true,
            dots:true
        });
    </script>
@endpush
