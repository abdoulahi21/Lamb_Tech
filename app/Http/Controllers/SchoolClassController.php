<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'level' => 'required|string',
            'teacher_id' => 'required|exists:profiles,id',
            'monthly_amount' => 'required|integer',
            'registration_amount' => 'required|integer',
            'month_required' => 'integer',
        ]);

        SchoolClass::create($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Classe créée avec succès.');
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
    public function update(Request $request, SchoolClass $sc)
    {
        $request->validate([
            'name' => 'required|string',
            'level' => 'required|string',
            'teacher_id' => 'required|exists:profiles,id',
            'monthly_amount' => 'required|integer',
            'registration_amount' => 'required|integer',
            'month_required' => 'integer',
        ]);

        $sc->update($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Classe mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolClass $sc)
    {
        $sc->delete();

        return redirect()->route('classes.index')
            ->with('success', 'Classe supprimée avec succès.');
    }
}
