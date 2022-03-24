@extends('layouts.master')
@section('title')
    <title>Quản lý nhóm người dùng</title>
@endsection
@section('css')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    @livewire('admin.user-category.index')
@endsection