<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->authorizeResource(Profile::class, 'profile');
      }
    public function index()
    {
        $user = Auth::user();

        // Récupère tous les profils pour un administrateur
        if ($user->role === 'admin') {
            $profiles = Profile::all();
        }
//        } else {
//            // Récupère les profils en fonction du rôle de l'utilisateur
//            $profiles = Profile::where('role', $user->role)->get();
//        }

        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:255',
            'gender' => 'required|string|in:masculin,feminin',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Maximum 2MB
        ]);

        // Créer un nouveau profil
        $profile = new Profile();
        $profile->name = $request->input('name');
        $profile->phone = $request->input('phone');
        $profile->gender = $request->input('gender');
        $profile->save();

        // Créer un nouvel utilisateur
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make(Str::random(12)); // Générer un mot de passe aléatoire
        $user->role = $request->input('role'); // Récupérer le rôle depuis le formulaire
        $user->profile_id = $profile->id;

        // Enregistrer la photo si elle est fournie
        if ($request->hasFile('image')) {
            $photoPath = $request->file('image')->store('assets', 'public');
            $profile->image = $photoPath;
        }


        $user->save();

        return redirect()->route('manager.profile.index')->with('success', 'Profil  ajouté avec succès.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
