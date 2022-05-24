@extends('admin.layouts.app')
@section('content')
    <section class="row flex-wrap">
        @php
            $listRoute = \App\Helpers\Menu::menus();
        @endphp
        @foreach($listRoute as $route)
            <div class=" col-12 col-lg-6 mt-1 mb-1">
                <div class="card shadow">
                    <div class="card-header">
                        <a href="{{$route['route']}}">{{$route['name']}}</a>
                    </div>
                    <div class="card-body">
                        <div class="pl-2">
                        @if (isset($route["sub-menu"]))
                            @foreach($route["sub-menu"] as $subRoute)
                                <div class="bg-gray  collapse-inner rounded">
                                    <a class="collapse-item" href="{{$subRoute["route"]}}">
                                        {{$subRoute["name"]}}
                                    </a>
                                </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection