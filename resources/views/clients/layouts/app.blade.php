<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include("clients.layouts.head")
@yield('css')
<body id="page-top">
@include('clients.layouts.header')
@include('clients.layouts.menu')


@yield('content')
</body>

@include('clients.layouts.footer')
@include('clients.layouts.script')
@yield('js')
</body>
</html>
