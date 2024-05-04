<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanningRequest;
use App\Models\Planning;
use Illuminate\Http\Request;

class PlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plannings = Planning::all();
        return view('plannings.index', compact('plannings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plannings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlanningRequest $request)
    {

        Planning::create($request->all());

        return redirect()->route('plannings.index')
            ->with('success', 'Planning created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Planning $planning)
    {
        return view('plannings.show', compact('planning'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Planning $planning)
    {
        return view('plannings.edit', compact('planning'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlanningRequest $request, Planning $planning)
    {


        $planning->update($request->all());

        return redirect()->route('plannings.index')
            ->with('success', 'Planning updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Planning $planning)
    {
        $planning->delete();

        return redirect()->route('plannings.index')
            ->with('success', 'Planning deleted successfully.');
    }
}
