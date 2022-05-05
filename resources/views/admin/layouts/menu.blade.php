   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
           <div class="sidebar-brand-icon rotate-n-15">
               <img class="img-profile rounded-circle" src="{{asset('logo.jpg')}}">
           </div>
           <div class="sidebar-brand-text mx-3"> Vinh <br> Hà Tĩnh</div>
       </a>

    @php
        getTreeMenu(\App\Helpers\Menu::menus());
    @endphp

       <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
       </div>
   </ul>
