@extends('layouts.master')
@section('title')
    <title>Quản lý phân quyền</title>
@endsection
@section('css')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    @livewire('admin.role.index')
@endsection