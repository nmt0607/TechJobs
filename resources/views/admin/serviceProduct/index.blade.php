@extends('layouts.master')
@section('title')
    <title>ServiceProduct</title>
@endsection
@section('css')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    @livewire('admin.service-product.index')
@endsection