<?php

namespace App\Http\Controllers;


use App\Http\Requests\CoursesRequest;

use App\Models\Course;
use App\Models\Profile;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    //
    public function __construct()
    {
        $this->authorizeResource(Course::class, 'course');
        }
    public function assignerCours(Request $request)
    {
        // Validez les données envoyées par le formulaire
        $request->validate([
            'event_name' => 'required|string|max:255',
            'teacher' => 'required|exists:enseignants,id',
            'classe' => 'required|exists:classes,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        // Créez un nouveau cours avec les données fournies
        $cours = new Course();
        $cours->event_name = $request->input('event_name');
        $cours->teacher_id = $request->input('teacher');
        $cours->classe_id = $request->input('classe');
        $cours->start_time = $request->input('start_time');
        $cours->end_time = $request->input('end_time');
        // Vous pouvez ajouter d'autres attributs ici

        // Sauvegardez le cours dans la base de données
        $cours->save();

        // Redirigez l'utilisateur vers une page appropriée
        return redirect()->back()->with('success', 'Cours assigné avec succès.');
    }



    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers=Profile::all();
        $courses=new Course();
        return view('course.create',
        compact('teachers','courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoursesRequest $request)
    {
        Course::create($request->all());

        return redirect()->route('manager.course.index')
            ->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $c)
    {
        return view('course.show', compact('c'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $c)
    {
        return view('course.edit', compact('c'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CoursesRequest $request, Course $c)
    {
        $c->update($request->all());

        return redirect()->route('course.index')
            ->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $c)
    {
        $c->delete();

        return redirect()->route('course.index')
            ->with('success', 'Course deleted successfully.');
    }
}
