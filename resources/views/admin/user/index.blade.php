@extends('layouts.master')
@section('title')
    <title>Người dùng</title>
@endsection
@section('css')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    @livewire('admin.user.index')
@endsection