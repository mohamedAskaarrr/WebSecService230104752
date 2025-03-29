@extends('layoutsmaster')
@section('title', 'Exam Results')
@section('content')

<div class="container text-center mt-5">
    <h1>Exam Results</h1>
    <p><strong>Score:</strong> {{ $score }} / {{ $totalQuestions }}</p>
    <p><strong>Percentage:</strong> {{ $percentage }}%</p>

    <div class="mt-4">
        <a href="{{ route('exam_start') }}" class="btn btn-success">Retake Exam</a>
        <a href="{{ route('exam_main') }}" class="btn btn-primary">Back to Home</a>
    </div>
</div>

@endsection
.