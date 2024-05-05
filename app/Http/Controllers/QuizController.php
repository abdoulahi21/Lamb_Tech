<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::all();
        return view('quizzes.index', compact('quizzes'));
    }
    public function play()
    {
        $quizzes = Quiz::all(); // Récupérer tous les quiz de la base de données
        return view('quizzes.play', compact('quizzes'));
    }
    public function result(Request $request)
    {
        $quizzes = Quiz::all(); // Récupérer tous les quiz de la base de données
        $score = 0; // Initialiser le score à 0
        $responses = []; // Initialiser le tableau des réponses

        foreach ($quizzes as $quiz)
        {
            // Vérifier si la réponse de l'utilisateur correspond à la bonne réponse
            if ($request->input('response_'.$quiz->id) == $quiz->response)
            {
                $score++; // Incrémenter le score
            }

            // Stocker la réponse de l'utilisateur pour chaque question dans le tableau $responses
            $responses['response_'.$quiz->id] = $request->input('response_'.$quiz->id);
        }

        return view('quizzes.results', compact('quizzes', 'score', 'responses'));
    }


    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'choose1' => 'required|string',
            'choose2' => 'required|string',
            'question' => 'required|string',
            'response' => 'required|string',
        ]);

        $quiz = Quiz::create($validatedData);

        return redirect()->route('manager.quizzes.index')->with('success', 'Quiz créé avec succès.');
    }

    /**
     * Display the specified resource.

     */
    public function show(Quiz $quiz)
    {
        return view('quizzes.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Quiz $quiz)
    {
        return view('quizzes.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.

     */
    public function update(Request $request, Quiz $quiz)
    {
        $validatedData = $request->validate([
            'choose1' => 'required|string',
            'choose2' => 'required|string',
            'question' => 'required|string',
            'response' => 'required|string',
        ]);

        $quiz->update($validatedData);

        return redirect()->route('manager.quizzes.index')->with('success', 'Quiz mis à jour avec succès.');
    }

    /**
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect()->route('manager.quizzes.index')->with('success', 'Quiz supprimé avec succès.');
    }
}
