@extends('layouts.master')
@section('title')
    <title>Survey</title>
@endsection
@section('css')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    @livewire('admin.survey.index')
@endsection