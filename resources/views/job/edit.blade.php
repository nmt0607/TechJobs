@extends('layouts.app')
@section('title')
    <title>Job Edit</title>
@endsection
@section('content')
    @livewire('job.job-create', ['jobId' => $id])
@endsection