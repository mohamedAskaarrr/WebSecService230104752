@extends('layoutsmaster')
@section('title', 'Add/Edit Question')
@section('content')

<div class="container mt-5">
    <form action="{{ route('exam_save_question', $question->id ?? null) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Question:</label>
            <input type="text" class="form-control" name="question_text" required value="{{ old('question_text', $question->question_text ?? '') }}">
        </div>
        @foreach(['A', 'B', 'C', 'D'] as $option)
        <div class="mb-3">
            <label class="form-label">Option {{ $option }}:</label>
            <input type="text" class="form-control" name="option_{{ strtolower($option) }}" required value="{{ old('option_'.strtolower($option), $question->{'option_'.strtolower($option)} ?? '') }}">
        </div>
        @endforeach
        <div class="mb-3">
            <label class="form-label">Correct Answer:</label>
            <select class="form-select" name="correct_answer">
                @foreach(['A', 'B', 'C', 'D'] as $option)
                    <option value="{{ $option }}" {{ old('correct_answer', $question->correct_answer ?? '') == $option ? 'selected' : '' }}>Option {{ $option }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

@endsection
