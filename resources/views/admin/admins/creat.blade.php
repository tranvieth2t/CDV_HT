@extends('admin.layouts.app')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Thêm admin</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{route('admins.store')}}">
                    @csrf
                    @include('admin.inc.form.input', [
                                'name' => 'email',
                                'label' => __('ui.label.email'),
                                'value' => '',
                                'colLabel' => 'col-lg-1 col-sm-1',
                                'colInput' => 'col-lg-5 col-sm-2',
                                'attributes' => ' maxlength="255"'
                                ])
                    @include('admin.inc.form.select', [
                                           'name' => 'club_id',
                                           'label' => __('alias_template.admin.stores.title.club_id'),
                                           'pluck' =>  ,
                                           'colLabel' => 'col-lg-4 col-sm-4',
                                           'colInput' => 'col-lg-6 col-sm-8',
                                           'value' => '店舗名、店舗ID で検索'
                                       ])

                </form>
            </div>
        </div>
    </div>
@endsection
