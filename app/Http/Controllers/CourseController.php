<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\User;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('lecturer')->latest()->paginate(10);

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $lecturers = User::whereHas('roles', fn ($query) => $query->where('name', 'lecturer'))->get();
        return view('courses.create', compact('lecturers'));
    }

    public function store(CourseRequest $request)
    {
        Course::create($request->validated());
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
        $lecturers = User::whereHas('roles', fn ($query) => $query->where('name', 'lecturer'))->get();
        return view('courses.edit', compact('course', 'lecturers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, Course $course)
    {
        $course->update($request->validated());
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
