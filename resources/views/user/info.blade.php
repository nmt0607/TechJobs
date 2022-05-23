@extends('layouts.app')
@section('title')
    <title>Job Apply List</title>
@endsection
@section('content')
    @livewire('user.user-info', ['userId'=>$id])
@endsection