<div class="featured-slider-2">
    <div class="featured-slider-2-items">
        @foreach($listBanner as $banner)
            <div class="slider-single">
                <div class="post-thumb position-relative">
                    <div class="thumb-overlay position-relative">
                        <div >
                            <img src="{{getDomainShowImage().$banner->thumbnail}}" style="object-fit: cover; width: 100%">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container position-relative">
        <div class="arrow-cover color-white"></div>
        <div class="featured-slider-2-nav-cover">
            <div class="featured-slider-2-nav">
                @foreach($listBanner as $banner)
                <div class="slider-post-thumb mr-15 mt-20 position-relative">
                    <div class="d-flex hover-up-2 transition-normal">
                        <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5">
                            <img class="border-radius-5" src="{{getDomainShowImage().$banner->thumbnail_small}}" alt="">
                        </div>
                        <div class="post-content media-body text-white">
                            <a href="{{$banner->link}}">
                            <h5 class="post-title mb-15 text-limit-2-row text-white">{{$banner->title}}</h5>
                            </a>
                            <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                <span class="post-on text-white">{{convertTimeDbToTimeString($banner->start_date)}} </span>
                                <span class="post-by has-dot text-white">{{convertTimeDbToTimeString($banner->end)}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>