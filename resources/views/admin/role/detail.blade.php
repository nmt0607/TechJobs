@extends('layouts.master')
@section('title')
    <title>{{$mode=='create'?"Thêm mới phân quyền":"Chỉnh sửa phân quyền"}}</title>
@endsection
@section('css')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    @livewire('admin.role.detail', ['mode' => $mode, 'editId' => $id])
@endsection