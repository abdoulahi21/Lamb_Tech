@php
    $professor = auth()->user()->profile;
@endphp
@extends('dashboard')

@section('title', 'Créer une tâche')

@section('contents')
{{--    @dd($teachers)--}}
    <div class="flex justify-between">
        <h1 class="text-3xl font-bold">Créer une tâche</h1>
        <a href="{{ url()->previous() }}" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Retour</a>
    </div>

    <div class="mt-8">
        <form method="POST" action="{{--{{ route('tasks.store') }}--}}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom de la tâche</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description de la tâche</label>
                <textarea name="description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required></textarea>
            </div>

            <div class="mb-4">
                <label for="due_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date d'échéance</label>
                <input type="date" name="due_date" id="due_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Statut de la tâche</label>
                <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    <option value="">Sélectionner le statut</option>
                    <option value="À faire">À faire</option>
                    <option value="En cours">En cours</option>
                    <option value="Terminé">Terminé</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="teacher_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Professeur</label>
                {{--<select name="teacher_id" id="teacher_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    <option value="">Sélectionner un professeur</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher['id'] }}">{{ $teacher['name'] }}</option>
                    @endforeach
                </select>--}}
                <input type="text" name="teacher_id" id="teacher_id" value="{{ $professor->id }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 hidden" >
                <input type="text" name="teacher_name" id="teacher_name" value="{{ $professor->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" >
            </div>

            <div class="mb-4">
                <label for="schoolClass_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Classe</label>
                <select name="schoolClass_id" id="schoolClass_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    <option value="">Sélectionner une classe</option>
                    @foreach($schoolClasses as $schoolClass)
                        <option value="{{ $schoolClass->id }}">{{ $schoolClass->level.' '.$schoolClass->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-8 flex justify-center">
                <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">
                    Créer la tâche
                </button>
            </div>
        </form>
    </div>
@endsection
