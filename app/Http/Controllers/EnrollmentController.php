<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $students = Student::with('courses')->get(); // Eager load to avoid N+1 issue
        return view('enrollments.index', compact('students'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('enrollments.create', ["students"=> $students, "courses"=> $courses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'student_id' => 'required|exists:students,id',
        'course_ids' => 'required|array',
        'course_ids.*' => 'exists:courses,id'
    ]);

    $student = Student::find($request->student_id);
    $student->courses()->sync($request->course_ids);

    return redirect()->route('enrollments.index')->with('success', 'Student enrolled successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         // Get the student with their enrolled courses
        $student = Student::with('courses')->findOrFail($id);
        
        // Get all available courses
        $allCourses = Course::all();
        
        // Get currently enrolled course IDs for easy checking
        $enrolledCourseIds = $student->courses->pluck('id')->toArray();
        
        return view('enrollments.edit', compact('student', 'allCourses', 'enrolledCourseIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'courses' => 'required|array',
            'courses.*'=> 'exists:courses,id'
        ]);

        $student = Student::findOrFail($id);
        $student->courses()->sync($request->courses);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
