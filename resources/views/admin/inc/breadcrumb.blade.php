@php($pathsLength = count($paths))
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ $header ?? '' }}</h2>
        <ol class="breadcrumb">
            @foreach($paths as $pathIndex => $path)
                @if($pathIndex == $pathsLength - 1)
                    <li>
                        <strong>{{ $path }}</strong>
                    </li>
                @else
                    <li>
                        <span>{{ $path }}</span>
                    </li>
                @endif
            @endforeach
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>
