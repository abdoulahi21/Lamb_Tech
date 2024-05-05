@extends('dashboard')

@section('title', $planning->exists ? 'Modifier un planning' : 'Ajouter un planning')

@section('contents')

    <div class="flex justify-between">
        <h1 class="text-3xl font-bold">{{ $planning->exists ? 'Modifier un planning' : 'Ajouter un planning' }}</h1>
        <a href="{{ url()->previous() }}" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Retour</a>
    </div>

    <div class="mt-8">
        <form action="{{ $planning->exists ? route('manager.planning.update', $planning) : route('manager.planning.store') }}" method="POST">
            @csrf
            @if($planning->exists)
                @method('PATCH')
            @endif

            <div>
                <label for="day" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jour</label>
                <input type="text" name="day" id="day" value="{{ old('day', $planning->day) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @error('day')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="start_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Heure de début</label>
                <input type="time" name="start_time" id="start_time" value="{{ old('start_time', $planning->start_time) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @error('start_time')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="end_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Heure de fin</label>
                <input type="time" name="end_time" id="end_time" value="{{ old('end_time', $planning->end_time) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @error('end_time')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="schoolclass_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Classe</label>
                <select name="schoolclass_id" id="schoolclass_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="">Sélectionnez une classe</option>
                    @foreach($schoolClasses as $schoolClass)
                        <option value="{{ $schoolClass->id }}" {{ old('schoolclass_id', $planning->schoolclass_id) == $schoolClass->id ? 'selected' : '' }}>
                            {{ $schoolClass->level }} {{ $schoolClass->name }}
                        </option>
                    @endforeach
                </select>
                @error('schoolclass_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="course_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cours</label>
                <select name="course_id" id="course_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="">Sélectionnez un cours</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ old('course_id', $planning->course_id) == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                    @endforeach
                </select>
                @error('course_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="teacher_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Enseignant</label>
                <select name="teacher_id" id="teacher_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="">Sélectionnez un enseignant</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ old('teacher_id', $planning->teacher_id) == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                    @endforeach
                </select>
                @error('teacher_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mt-8 flex justify-center">
                <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">
                    {{ $planning->exists ? 'Modifier' : 'Ajouter' }}
                </button>
            </div>
        </form>
    </div>

@endsection
