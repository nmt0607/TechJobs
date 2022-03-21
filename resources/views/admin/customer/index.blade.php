@extends('layouts.master')
@section('title')
    <title>Customer</title>
@endsection
@section('css')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    @livewire('admin.customer.index')
@endsection