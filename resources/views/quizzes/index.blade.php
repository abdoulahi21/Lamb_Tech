<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription d'un étudiant</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        /* Style pour cacher les sections par défaut */
        .form-section {
            display: none;
        }
        /* Style pour afficher la première section par défaut */
        #personal-info {
            display: block;
        }
    </style>
</head>
<body>
@extends('dashboard')
@section('title', 'Inscription d\'un étudiant')
@section('contents')
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-8">Liste des quiz</h1>
    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 mb-4" href="{{ route('manager.quizzes.create') }}">
        Créer un quiz
    </a>
    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 mb-4" href="{{ route('manager.quizzes.play') }}">
        jouer au quiz
    </a>
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="px-4 py-2">Choix 1</th>
            <th class="px-4 py-2">Choix 2</th>
            <th class="px-4 py-2">Question</th>
            <th class="px-4 py-2">Réponse</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($quizzes as $quiz)
            <tr>
                <td class="border px-4 py-2">{{ $quiz->choose1 }}</td>
                <td class="border px-4 py-2">{{ $quiz->choose2 }}</td>
                <td class="border px-4 py-2">{{ $quiz->question }}</td>
                <td class="border px-4 py-2">{{ $quiz->response }}</td>
                <td class="border px-4 py-2">
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('manager.quizzes.edit', $quiz->id) }}">
                        Modifier
                    </a>
                    <form action="{{ route('manager.quizzes.destroy', $quiz->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="inline-block align-baseline font-bold text-sm text-red-500 hover:text-red-800" type="submit">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
</body>
</html>
