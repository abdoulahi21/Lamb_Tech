<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommunicationRequest;
use App\Models\Communication;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $communications = Communication::all();
        return view('communications.index', compact('communications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('communications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunicationRequest $request)
    {
        // Validate the incoming request data
        $request->validate([
            'sender_id' => 'required',
            'recipient_id' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Create a new Communication instance
        Communication::create($request->all());

        // Redirect the user back with success message
        return redirect()->route('communications.index')
            ->with('success', 'Communication created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Communication $c)
    {
        return view('communications.show', compact('c'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Communication $c)
    {
        return view('communications.edit', compact('c'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommunicationRequest $request, Communication $c)
    {
        // Validate the incoming request data
        $request->validate([
            'sender_id' => 'required',
            'recipient_id' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Update the Communication instance
        $c->update($request->all());

        // Redirect the user back with success message
        return redirect()->route('communications.index')
            ->with('success', 'Communication updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Communication $c)
    {
        // Delete the Communication instance
        $c->delete();

        // Redirect the user back with success message
        return redirect()->route('communications.index')
            ->with('success', 'Communication deleted successfully.');
    }
}
