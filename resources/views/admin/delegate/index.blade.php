@extends('layouts.master')
@section('title')
    <title>Delegate</title>
@endsection
@section('css')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    @livewire('admin.delegate.index')
@endsection