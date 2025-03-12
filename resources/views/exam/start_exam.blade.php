@extends('layoutsmaster')
@section('title', 'Start Exam')
@section('content')

<form action="{{ route('exam_submit') }}" method="POST">
    @csrf
    @foreach($questions as $question)
        <div class="mb-3">
            <p><strong>{{ $question->question_text }}</strong></p>
            @foreach(['A', 'B', 'C', 'D'] as $option)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}" required>
                    <label class="form-check-label">{{ $question->{'option_'.strtolower($option)} }}</label>
                </div>
            @endforeach
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Submit Exam</button>
</form>


@endsection
