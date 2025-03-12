@extends('layoutsmaster')
@section('title', 'Manage Questions')
@section('content')

<div class="row mb-3">
    <div class="col col-10">
        <h1>Questions</h1>
    </div>
    <div class="col col-2">
        <a href="{{ route('exam_add_question') }}" class="btn btn-success form-control">Add Question</a>
    </div>
</div>

<table class="table table-striped">
    <tr><th>Question</th><th>Actions</th></tr>
    @foreach($questions as $question)
        <tr>
            <td>{{ $question->question_text }}</td>
            <td>
                <a href="{{ route('exam_edit_question', $question->id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('exam_delete_question', $question->id) }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
</table>

@endsection
