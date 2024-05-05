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
@section('title', 'Quizz d\'un étudiant')
@section('contents')
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-8">Créer un quiz</h1>
    <form action="{{ route('manager.quizzes.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="choose1">
                Choix 1
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="choose1" type="text" name="choose1" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="choose2">
                Choix 2
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="choose2" type="text" name="choose2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="question">
                Question
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="question" type="text" name="question" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="response">
                Réponse
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="response" type="text" name="response" required>
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Créer
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('manager.quizzes.index') }}">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection
</body>
</html>
