<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\Profile;
use App\Models\SchoolClass;
use App\Models\Student; // Ajoutez le modèle Student
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function index()
    {
        //$students = Profile::all();
        return view('registration.newStudentRegistration');
    }

    public function create()
    {
        $profiles = Profile::all();
        $schoolClasses = SchoolClass::all();

        return view('registration.newStudentRegistration', compact('profiles', 'schoolClasses'));
    }

    public function store(RegistrationRequest $request)
    {
        $validatedData = $request->validated();

        // Remplacez "Profile" par "Student"
        $student = Profile::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'place_of_birth' => $validatedData['place_of_birth'],
            'parent_name' => $validatedData['parent_name'],
            'parent_email' => $validatedData['parent_email'], // Ajoutez cette ligne
            'parent_phone' => $validatedData['parent_phone'],
            'parent_address' => $validatedData['parent_address'],
            'profile_id' => $validatedData['profile_id'],
            'schoolclass_id' => $validatedData['schoolclass_id'],
            'academic_year' => $validatedData['academic_year'],
            'status' => $validatedData['status'],
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/students');
            $student->image_path = Storage::url($imagePath);
            $student->save();
        }

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $document) {
                $documentPath = $document->store('public/students');
                $student->documents()->create([
                    'path' => Storage::url($documentPath),
                ]);
            }
        }

        return redirect()->route('manager.registration.index')->with('success', 'Étudiant inscrit avec succès.');
    }

    public function show(Student $student) // Remplacez "Profile" par "Student"
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student) // Remplacez "Profile" par "Student"
    {
        $profiles = Profile::all();
        $schoolClasses = SchoolClass::all();

        return view('students.edit', compact('student', 'profiles', 'schoolClasses'));
    }

    public function update(RegistrationRequest $request, Profile $student) // Remplacez "Profile" par "Student"
    {
        $validatedData = $request->validated();

        $student->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'place_of_birth' => $validatedData['place_of_birth'],
            'parent_name' => $validatedData['parent_name'],
            'parent_email' => $validatedData['parent_email'], // Ajoutez cette ligne
            'parent_phone' => $validatedData['parent_phone'],
            'parent_address' => $validatedData['parent_address'],
            'profile_id' => $validatedData['profile_id'],
            'schoolclass_id' => $validatedData['schoolclass_id'],
            'academic_year' => $validatedData['academic_year'],
            'status' => $validatedData['status'],
        ]);

        if ($request->hasFile('image')) {
            if ($student->image_path) {
                Storage::delete(Str::after($student->image_path, 'storage'));
            }

            $imagePath = $request->file('image')->store('public/students');
            $student->image_path = Storage::url($imagePath);
            $student->save();
        }

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $document) {
                $documentPath = $document->store('public/students');
                $student->documents()->create([
                    'path' => Storage::url($documentPath),
                ]);
            }
        }

        return redirect()->route('manager.students.index')->with('success', 'Étudiant mis à jour avec succès.');
    }

    public function destroy( $student) // Remplacez "Profile" par "Student"
    {
        if ($student->image_path) {
            Storage::delete(Str::after($student->image_path, 'storage'));
        }

        $student->documents()->delete();
        $student->delete();

        return redirect()->route('manager.students.index')->with('success', 'Étudiant supprimé avec succès.');
    }
}
