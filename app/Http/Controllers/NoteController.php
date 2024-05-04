<?php

namespace App\Http\Controllers;


use App\Http\Requests\NotesRequest;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    //
    public function __construct()
    {
        $this->authorizeResource(Note::class, 'note');
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotesRequest $request)
    {

        Note::create($request->all());

        return redirect()->route('notes.index')
            ->with('success', 'Note created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NotesRequest $request, Note $note)
    {

        $note->update($request->all());

        return redirect()->route('notes.index')
            ->with('success', 'Note updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')
            ->with('success', 'Note deleted successfully.');
    }
}
