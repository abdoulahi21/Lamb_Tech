<?php

namespace App\Http\Controllers;


use App\Http\Requests\NotesRequest;
use App\Models\Note;
use App\Models\Profile;
use App\Models\User;
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
        return view('note.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //je veux recuperer les utilisateurs qui ont comme role teacher
        $teachers = User::where('role', 'professeur')->get();
        $students = User::where('role', 'etudiant')->get();
        $note= new Note();
        return view('note.create', compact('teachers', 'students', 'note'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotesRequest $request)
    {

        Note::create($request->all());

        return redirect()->route('manager.note.index')
            ->with('success', 'Note created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view('note.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return view('note.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NotesRequest $request, Note $note)
    {

        $note->update($request->all());

        return redirect()->route('note.index')
            ->with('success', 'Note updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('note.index')
            ->with('success', 'Note deleted successfully.');
    }
}
