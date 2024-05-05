<?php

namespace App\Http\Controllers;
use App\Http\Requests\PlanningRequest;
use App\Models\Course;
use App\Models\Planning;
use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PlanningController extends Controller
{
    //
    public function __construct()
    {
        $this->authorizeResource(Planning::class, 'planning');
    }


    public function showCalendar()
    {
        // Récupérer tous les plannings depuis la base de données
        $plannings = Planning::all();

        // Formatter les plannings pour les afficher dans un format adapté pour un calendrier
        $formattedPlannings = $plannings->map(function ($planning) {
            return [
                'title' => $planning->course->name, // Nom du cours (ou toute autre information pertinente)
                'start' => Carbon::parse($planning->date)->toDateString(), // Convertir la date au format YYYY-MM-DD
                'end' => Carbon::parse($planning->date)->addDays(1)->toDateString(), // Supposons que le planning dure une journée entière
                'backgroundColor' => '#057A55', // Couleur de fond par défaut
                'url' => route('planning.show', $planning->id) // URL pour voir les détails du planning
            ];
        });

        // Passer les plannings formatés à la vue du calendrier
        return view('calendar', [
            'plannings' => $formattedPlannings
        ]);
    }


    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $plannings = Planning::all();
        return view('students.student-planning', compact('plannings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schoolClasses = SchoolClass::all();
        $courses = Course::all();
        $teachers = User::whereHas('profile', function ($query) {
            $query->where('role', 'professeur');
        })->get();

        $planning = new Planning(); // Crée une nouvelle instance de Planning

        return view('students.addplanning', compact('planning', 'schoolClasses', 'courses','teachers'));
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
