@extends('layouts.master')
@section('title')
    <title>Khai báo SLA theo SPDV</title>
@endsection
@section('css')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    @livewire('admin.sla.priority-spdv')
@endsection