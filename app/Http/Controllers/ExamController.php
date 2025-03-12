<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;


class ExamController extends Controller
{
    // Display a listing of the exams
    public function index()
    {
        $exams = Exam::all();
        return view('exam.question_form', compact('exams'));
    }

    // Show the form for creating a new exam
    public function create()
    {
        return view('exam.main');
    }

    // Store a newly created exam in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Exam::create($request->all());

        return redirect()->route('exam.main')
                         ->with('success', 'Exam created successfully.');
    }

    // Display the specified exam
    public function show($id)
    {
        $exam = Exam::find($id);
        return view('exam.main', compact('exam'));
    }

    // Show the form for editing the specified exam
    public function edit($id)
    {
        $exam = Exam::find($id);
        return view('exam.main', compact('exam'));
    }

    // Update the specified exam in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $exam = Exam::find($id);
        $exam->update($request->all());

        return redirect()->route('exam.main')
                         ->with('success', 'Exam updated successfully.');
    }

    // Remove the specified exam from storage
    public function destroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();

        return redirect()->route('exam.index')
                         ->with('success', 'Exam deleted successfully.');
    }
}




