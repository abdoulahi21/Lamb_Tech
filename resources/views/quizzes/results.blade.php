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
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Résultats du quiz</h1>
        <p class="text-lg font-semibold">Votre score : {{ $score }}/{{ count($quizzes) }}</p>
        <div class="mt-4">
            @foreach ($quizzes as $quiz)
                <div class="mb-4">
                    <p class="text-lg font-semibold">{{ $quiz->question }}</p>
                    <div class="mt-2">
                        <p class="font-semibold">Votre réponse :</p>
                        <p>{{ $responses['response_'.$quiz->id] }}</p>
                    </div>
                    <div class="mt-2">
                        <p class="font-semibold">Bonne réponse :</p>
                        <p>{{ $quiz->response }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
