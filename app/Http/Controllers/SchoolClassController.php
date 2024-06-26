<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolClasseRequest;
use App\Models\Profile;
use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(SchoolClass::class, 'absence');
        }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = SchoolClass::all();
        return view('schoolclasses.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = User::where('role', 'professeur')->get();
        $schoolClass = new SchoolClass();
        return view('schoolclasses.create',['schoolClass' => $schoolClass],['teachers' => $teachers]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(SchoolClasseRequest $request)
    {
        SchoolClass::create($request->all());
        return redirect()->route('manager.schoolclass.index')
            ->with('success', 'Classe créée avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(SchoolClass $sc)
    {
        //je récupère les élèves de la classe
        $students = $sc->students()->get();
        return view('schoolclass.show', ['class' => $sc], ['students' => $students]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolClass $sc)
    {
        return view('classes.edit', ['class' => $sc]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SchoolClasseRequest $request, SchoolClass $sc)
    {


        $sc->update($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Class updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolClass $sc)
    {
        $sc->delete();
        return redirect()->route('classes.index')
            ->with('success', 'Class deleted successfully.');
    }
}
