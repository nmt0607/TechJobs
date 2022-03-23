@extends('layouts.master')
@section('title')
    <title>Chi tiết đánh giá</title>
@endsection
@section('css')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    @livewire('admin.survey.edit',['surveyId' => $surveyId])
@endsection