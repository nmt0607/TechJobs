@extends('layouts.master')


@section('content')
<div class="body-content p-2">
    <div class="p-2 pb-3 d-flex align-items-center justify-content-between">
        <div class="">
            <h4 class="m-0">
                Thêm mới người dùng 
            </h4>
        </div>
        <div class="paginate">
            <div class="d-flex">
                <div class="">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                </div>
                <span class="px-2">/</span>
                <div class="">
                    <div class="disable">Thêm mới người dùng</div>
                </div>
            </div>
        </div>
    </div>
</div>    
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-body">
            {!! Form::open(array('route' => 'user.store','method'=>'POST')) !!}
                @include('admin.user._form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

