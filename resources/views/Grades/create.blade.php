<!-- <!DOCTYPE html>
<html>
<head>
    <title>Add New Grade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Add New Grade</h1>
        <form action="{{ route('grades.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Course Name</label>
                <input type="text" name="course_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Term</label>
                <input type="text" name="term" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Credit Hours</label>
                <input type="number" name="credit_hours" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Grade</label>
                <select name="grade" class="form-control" required>
                    <option value="A">A</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="B-">B-</option>
                    <option value="C+">C+</option>
                    <option value="C">C</option>
                    <option value="F">F</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>  -->


@extends('layout')

@section('content')
<div class="container">
    <h1>Create New Grade</h1>
    <form action="{{ route('grades.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" name="course_name" id="course_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="grade">Grade</label>
            <input type="text" name="grade" id="grade" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="credit_hours">Credit Hours</label>
            <input type="number" name="credit_hours" id="credit_hours" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="term">Term</label>
            <input type="text" name="term" id="term" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create Grade</button>
    </form>
</div>
@endsection