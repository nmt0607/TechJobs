@extends('layouts.app')
@section('title')
    <title>Job Detail</title>
@endsection
@section('content')
    @livewire('job.job-detail', ['jobId'=>$id])
@endsection