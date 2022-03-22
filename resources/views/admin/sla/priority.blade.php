@extends('layouts.master')
@section('title')
    <title>Quản lý mức độ ưu tiên</title>
@endsection
@section('css')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    @livewire('admin.sla.priority')
@endsection