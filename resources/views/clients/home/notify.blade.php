<div class="site-bottom">
    <div class="container">
        <div class="sidebar-widget widget-latest-posts mb-30 mt-20 wow fadeInUp animated">
            <div class="widget-header-2 position-relative mb-30">
                <h5 class="widget-title mt-5 mb-30">Thông báo</h5>
            </div>
            <div class="carausel-3-columns" >
                @foreach($listNotify  as $notify)
                <div class="carausel-3-columns-item d-flex bg-grey has-border p-15 hover-up-2 transition-normal border-radius-5 " style="min-height: 100px">
                    <div class="post-thumb post-thumb-64 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                        <a class="color-white" href="single.html.htm">
                            <img src="{{getDomainShowImage().$notify->thumbnail}}" alt="">
                        </a>
                    </div>
                    <div class="post-content media-body">
                        <p><a href="{{route("clients.notify.show", [$notify->id])}}" class="text-limit-3-row">{!!$notify->title!!}</a></p>
                        <p class="text-muted font-small mb-0">{{ convertTimeDbToTimeString($notify->created_at) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--container-->
</div>
