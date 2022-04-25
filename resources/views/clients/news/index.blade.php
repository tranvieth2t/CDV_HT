@extends('clients.layouts.app')
@section('content')
   <div id = 'main'>
       <div class="rows" >
           @foreach($listNews as $news)
           <div class="col-6" style="max-height: 100px;">
               <div class="img col-6" style="overflow: hidden">
                   <img src="{{asset('assets/img/portfolio/portfolio-1.jpg')}}">
               </div>
               <div class="col-4">
                   <p >{{$news->title}} </p>
               </div>
           </div>
           @endforeach
       </div>
   </div>
@endsection

@push('scripts')
    <script !src="">

        // $(".swiper-wrapper").owlCarousel({
        //     slideSpeed: 300,
        //     paginationSpeed: 400,
        //     items: 1,
        //     autoplay: true,
        //     loop: true,
        //     dots:true
        // });
    </script>
@endpush
