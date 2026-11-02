<?php

namespace App\Http\Controllers;

use App\Models\CourserRequest;
use Illuminate\Http\Course;
use Illuminate\Http\User;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $courses =Course::with('lecturer')->latest()->paginate(10);
    return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lecturers = User::where('role', 'lecturer')->get();
        return view('courses.create', compact('lecturers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
       course::create($request->validated());
        return redirect()->route('courses.index')->with('success', 'Course created successfully.'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course->load('lecturer');
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $lecturers = User::where('role', 'lecturer')->get();
        return view('courses.edit', compact('course', 'lecturers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->update($request->validated());
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if($course->students()->count() > 0) {
            return redirect()->route('courses.index')->with('error', 'Cannot delete course with enrolled students.');
        }
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
