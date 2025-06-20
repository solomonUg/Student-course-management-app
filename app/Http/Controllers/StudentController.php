<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('name', 'asc')->paginate(5);
        return view('students.index', ["students" => $students]);
    }

    public function show($id) {
        $student = Student::findOrFail($id);
        return view ('students.show', ["student" => $student]);
    }

    public function create(){
        return view('students.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:10',
            'address' => 'required|string|max:255',
        ]);

        // Log the validated form data to the console (browser's console)
        // dd($request->all());


        Student::create($validatedData); 

        return redirect()->route('students.index')->with('success', 'Student created successfully.');

    } 

    public function edit($id){
        $student = Student::findOrFail($id);
        return view('students.edit', ["student" => $student]);
    }

    public function update(Request $request, $id){
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:10',
            'address' => 'required|string|max:255',
        ]);

        // Update the student record
        $student = Student::findOrFail($id);
        $student->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

}
