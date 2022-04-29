<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('clients.layouts.head')
<body>
<div class="scroll-progress primary-bg"></div>
<div class="preloader text-center">
    <div class="circle"></div>
</div>
@include('clients.layouts.slide_left')
@include('clients.layouts.header')
<main class="bg-grey pb-30">
    @yield('content')
</main>
@include('clients.layouts.footer')

<div class="dark-mark"></div>
@include('clients.layouts.script')
</body>
</html>
