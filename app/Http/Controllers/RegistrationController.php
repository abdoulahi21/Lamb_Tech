<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\Profile;
use App\Models\Registration;
use App\Models\SchoolClass;
use App\Models\Student; // Ajoutez le modèle Student
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function index()
    {
        //$students = Profile::all();
        return view('registration.newStudentRegistration');
    }

    public function schoolclasseDetails($id)
    {
        //récupérer les détails de la classe en fonction de l'ID
        $schoolclass = SchoolClass::find($id);
        dd($schoolclass);
        if (!$schoolclass) {
            return response()->json(['error' => 'schoolclass not found'], 404);
        }

        return response()->json([
            'monthly_amount' => $schoolclass->monthly_amount,
            'registration_amount' => $schoolclass->registration_amount,
        ]);

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
        //dd($validatedData);

        $parentProfile = Profile::create([
            'name' => $validatedData['parent_name'],
            'parent_email' => $validatedData['parent_email'],
            'phone_parent' => $validatedData['phone_parent'],
        ]);
        //dd($parentProfile);

        // Créez d'abord le profil de l'étudiant
        $studentProfile = Profile::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'birthday' => $validatedData['birthday'],
            'place_of_birth' => $validatedData['place_of_birth'],
            'responsable_id' => $parentProfile->id,
        ]);

        // Enregistrez l'image de l'étudiant, le cas échéant
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/students');
            $studentProfile->image_path = Storage::url($imagePath);
            $studentProfile->save();
        }

        // Associez la classe scolaire au profil de l'étudiant
        $schoolClass = SchoolClass::find($validatedData['school_class_id']);
        $studentProfile->update(['schoolclass_id' => $schoolClass->id]);
        $studentProfile->update(['month_paid' => $schoolClass->month_required]);

        // Créez l'enregistrement dans la table pivot "registrations"
        Registration::create(
            [
                'profile_id'=>$studentProfile->id,
                'schoolclass_id'=>$schoolClass->id,
                'academic_year'=>$validatedData['academic_year'],
                'status'=>$validatedData['status'],
            ]
        );

        // Enregistrez les documents, le cas échéant
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $document) {
                $documentPath = $document->store('public/students');
                $studentProfile->documents()->create([
                    'path' => Storage::url($documentPath),
                ]);
            }
        }
        // Récupérer le nom et l'année de naissance de l'étudiant
        $name = $studentProfile->name;
        $birthday = $studentProfile->birthday;

// Récupérer uniquement l'année de naissance
        $birthYear = date('Y', DateTime::createFromFormat('Y-m-d', $birthday)->getTimestamp());

// Limiter le nom à 8 caractères si nécessaire
        if (strlen($name) > 8) {
            $name = substr($name, 0, 8);
        }

// Créer l'adresse e-mail en utilisant le nom et l'année de naissance
        $email = $name . $birthYear . '@groupeit.sn';

// Créer l'utilisateur
        $student = new User();
        $student->profile_id = $studentProfile->id;
        $student->name = $studentProfile->name;
        $student->email = $email;
        $student->password = Hash::make('passer@123');
        $student->role = 'student';
        $student->save();
//parent
        $parent = new User();
        $parent->email = $parentProfile->parent_email;
        $parent->password = Hash::make('passer@123');
        $parent->role = 'parent';
        $parent->profile_id = $parentProfile->id;
        $parent->name = $parentProfile->name;
        $parent->save();



        return redirect()->route('manager.registration.index')->with('success', 'Étudiant inscrit avec succès.');
    }






}
