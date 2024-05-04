<?php

namespace App\Http\Controllers;


use App\Http\Requests\FacturationRequest;

use App\Models\Facturation;
use Illuminate\Http\Request;

class FacturationController extends Controller
{

    //
    public function __construct()
    {
        $this->authorizeResource(Facturation::class, 'facturation');
      }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $facturations = Facturation::all();
        return view('facturations.index', compact('facturations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('facturations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FacturationRequest $request)
    {

        Facturation::create($request->all());

        return redirect()->route('facturations.index')
            ->with('success', 'Facturation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Facturation $facturation)
    {
        return view('facturations.show', compact('facturation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facturation $facturation)
    {
        return view('facturations.edit', compact('facturation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FacturationRequest $request, Facturation $facturation)
    {

        $facturation->update($request->all());

        return redirect()->route('facturations.index')
            ->with('success', 'Facturation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facturation $facturation)
    {
        $facturation->delete();

        return redirect()->route('facturations.index')
            ->with('success', 'Facturation deleted successfully.');
    }
}
