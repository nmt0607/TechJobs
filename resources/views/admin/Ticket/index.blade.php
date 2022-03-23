@extends('layouts.master')
@section('title')
    <title>Ticket</title>
@endsection
@section('css')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    @livewire('admin.ticket.index')
@endsection