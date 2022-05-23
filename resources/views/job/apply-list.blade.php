@extends('layouts.app')
@section('title')
    <title>Job Apply List</title>
@endsection
@section('content')
    @livewire('job.job-apply-list', ['jobId'=>$id])
@endsection