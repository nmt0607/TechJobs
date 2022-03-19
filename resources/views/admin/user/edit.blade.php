@extends('layouts.master')


@section('content')
<div class="body-content p-2">
    <div class="p-2 pb-3 d-flex align-items-center justify-content-between">
        <div class="">
            <h4 class="m-0">
                Chỉnh sửa người dùng 
            </h4>
        </div>
        <div class="paginate">
            <div class="d-flex">
                <div class="">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                </div>
                <span class="px-2">/</span>
                <div class="">
                    <div class="disable">Chỉnh sửa người dùng</div>
                </div>
            </div>
        </div>
    </div>
</div>
    {!! Form::model($data, ['method' => 'PATCH', 'autocomplete' => "off",'route' => ['user.update', $data->id]]) !!}
        @include('admin.user._form')
    {!! Form::close() !!}
@endsection
