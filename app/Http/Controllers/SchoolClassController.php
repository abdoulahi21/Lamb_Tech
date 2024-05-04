<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolClasseRequest;
use App\Models\SchoolClass;
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
        return view('classes.index', ['classes' => $classes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolClasseRequest $request)
    {

        SchoolClass::create($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Class created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolClass $sc)
    {
        return view('classes.show', ['class' => $sc]);
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
