@extends('layouts.master')
@section('title')
    <title>Danh sách nhóm người dùng</title>
@endsection
@section('css')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    @livewire('admin.role.index')
@endsection