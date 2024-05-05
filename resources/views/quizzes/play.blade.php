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
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Jouer au quiz</h1>
        <form action="{{ route('quizzes.results') }}" method="POST">
        @csrf
            @foreach ($quizzes as $quiz)
                <div class="mb-4">
                    <p class="text-lg font-semibold">{{ $quiz->question }}</p>
                    <div class="mt-2">
                        <input type="radio" name="response_{{ $quiz->id }}" value="{{ $quiz->choose1 }}" required>
                        <label class="ml-2">{{ $quiz->choose1 }}</label>
                    </div>
                    <div class="mt-2">
                        <input type="radio" name="response_{{ $quiz->id }}" value="{{ $quiz->choose2 }}" required>
                        <label class="ml-2">{{ $quiz->choose2 }}</label>
                    </div>
                </div>
            @endforeach
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Soumettre les réponses</button>
        </form>
    </div>
@endsection
