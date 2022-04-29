<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include("admin.layouts.head")
@yield('css')


<body id="page-top">
    <div id="wrapper">
        @include('admin.layouts.menu')
        
        <div id="content-wrapper" class="d-flex flex-column">
            @include('admin.layouts.header')
            <div class="container-fluid">
                @include('admin.layouts.message')
                @include('admin.layouts.error_modal')
                @yield('content')
            </div>
        </div>
    </div>
</body>

@include('admin.layouts.footer')
@yield('js')
</body>
</html>