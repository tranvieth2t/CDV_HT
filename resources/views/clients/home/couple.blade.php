<section class="">
    <div class="container">
        <div class="hot-tags pt-30 pb-30 font-small align-self-center">
            <div class="widget-header-2">
                <div class="row align-self-center">
                    <div class="col-md-4 align-self-center">
                        <h4 class="widget-title">Tân Gia Đình Công giáo</h4>
                    </div>
                    <div class="col-md-8 text-md-right font-small align-self-center">
                        <a href="{{route('clients.couple.index')}}" class="d-inline-block mr-5 mb-0">
                            <i class="elegant-icon  icon_tag_alt mr-5 text-muted"></i> Xem thêm
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($listCouple  as $couple)
                <div class=" col-lg-6 post-module-3">
                    <div class="loop-list loop-list-style-1">
                        <article class="hover-up-2 transition-normal wow fadeInUp animated">
                            <div class="row mb-40 list-style-2">
                                <div class="col-md-7">
                                    <div class="post-content">
                                        <h6 class="post-title font-weight-600 mb-15 text-justify">
                                            <a href="{{route('clients.couple.show', [$couple->id])}}">Anh {{$couple->male}} & Chị {{$couple->female}}</a>
                                        </h6>
                                        <div class="post-excerpt mb-15 text-limit-3-row font-small text-muted text-justify">
                                            <p class="mb-1 p-0">{{$couple->communityMale->name ?? "Khác"}} & {{$couple->communityFemale->name ?? "Khác"}}</p>
                                            <p class="m-0 p-0">{{$couple->description}}</p>
                                        </div>
                                        <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                            <span class="post-on">Ngày cưới: {{convertTimeDbToTimeStringDate($couple->date_wedding)}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="post-thumb position-relative border-radius-5">
                                        <div class="img-hover-slide border-radius-5 position-relative"
                                             style="background-image: url({{getDomainShowImage().$couple->thumbnail}})">
                                            <a class="img-link"
                                               href="{{route('clients.couple.show', [$couple->id])}}"></a>
                                        </div>
                                        <ul class="social-share">
                                            <li><a href="#"><i class="fa-solid fa-share"></i></a></li>
                                            <li>
                                                <a class="fb"
                                                   {{--                                                   href="https://www.facebook.com/sharer.php?u={{route('clients.news.show', [$couple->id])}}"--}}
                                                   title="Share on Facebook" target="_blank">
                                                    <i class="fa-brands fa-facebook"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>