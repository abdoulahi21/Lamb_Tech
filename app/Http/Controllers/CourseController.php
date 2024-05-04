<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursesRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoursesRequest $request)
    {
        Course::create($request->all());

        return redirect()->route('courses.index')
            ->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $c)
    {
        return view('courses.show', compact('c'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $c)
    {
        return view('courses.edit', compact('c'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CoursesRequest $request, Course $c)
    {
        $c->update($request->all());

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $c)
    {
        $c->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
