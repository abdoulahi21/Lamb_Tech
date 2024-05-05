<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        //je veux recuperer le nombre total d'utilisateurs qui ont le role professeur
        $teachers = User::where('role', 'professeur')->get();
        //je veux recuperer le nombre total de classes
        $classes = SchoolClass::all();
        //je veux recuperer le nombre total d'utilisateurs qui ont le role student
        $students = User::where('role', 'student')->get();
        //je veux recuperer le nombre total des cour
        $courses = Course::all();
        return view('home',compact('teachers','classes','students','courses'));
    }
}
