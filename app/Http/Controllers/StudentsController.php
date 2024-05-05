<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function planning()
    {
        return view('students.student-planning');
    }
}
