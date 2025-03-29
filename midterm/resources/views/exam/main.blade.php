@extends('layoutsmaster')
@section('title', 'MCQ Exam System')
@section('content')

<div class="container text-center mt-5">
    <h1>Welcome to the MCQ Exam System</h1>
    <p>Select an option below:</p>
    
    <div class="row mt-4">
        <div class="col-md-5">
            <a href="{{ route('exam_manage_questions') }}" class="btn btn-primary btn-lg w-100">Questions Management</a>
        </div>
        <div class="col-md-5">
            <a href="{{ route('exam_start') }}" class="btn btn-success btn-lg w-100">Start Exam</a>
        </div>
    </div>
</div>


@endsection