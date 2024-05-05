@extends('dashboard')

@section('title', $note->exists ? 'Modifier une note' : 'Ajouter une note')

@section('contents')

    <div class="flex justify-between">
        <h1 class="text-3xl font-bold">{{ $note->exists ? 'Modifier une classe' : 'Ajouter une classe' }}</h1>
        <a href="{{ url()->previous() }}" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Retour</a>
    </div>

    <div class="mt-8">
        <form action="{{ $note->exists ? route('manager.note.update', $note) : route('manager.note.store') }}" method="POST">
            @csrf
            @if($note->exists)
                @method('PATCH')
            @endif

            <div>
                <label for="note" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Note</label>
                <input type="number" name="note" id="note" value="{{ old('note', $note->note) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @error('note')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- ajouter le select pour choisir le course_id--}}
            <div class="mt-4">
                <label for="course_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cours</label>
                <select name="course_id" id="course_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="">Sélectionner le cours</option>
                    @foreach(\App\Models\Course::all() as $course)
                        <option value="{{ $course->id }}" {{ old('course_id', $note->course_id) == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                    @endforeach
                </select>
                @error('course_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            {{--ajouter l'appreciation--}}
            <div>
                <label for="appreciation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Appréciation</label>
                <input type="text" name="appreciation" id="appreciation" value="{{ old('appreciation', $note->appreciation) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @error('appreciation')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="semester" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Semester</label>
                <select name="semester" id="semester" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="">Sélectionner le semestre</option>
                    <option value="Semestre 1" {{ old('semester', $note->semester) === 'Semestre 1' ? 'selected' : '' }}>Semestre 1</option>
                    <option value="Semestre 2" {{ old('semester', $note->semester) === 'Semestre 2' ? 'selected' : '' }}>Semestre 2</option>
                </select>
                @error('semester')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="student_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Étudiant</label>
                <select name="student_id" id="student_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="">Sélectionnez un étudiant</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ old('student_id', $note->student_id) == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                    @endforeach
                </select>
                @error('student_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="">Sélectionner le type</option>
                    <option value="Examen" {{ old('type', $note->type) === 'Examen' ? 'selected' : '' }}>Examen</option>
                    <option value="Devoir" {{ old('type', $note->type) === 'Devoir' ? 'selected' : '' }}>Devoir</option>
                    <option value="TP" {{ old('type', $note->type) === 'TP' ? 'selected' : '' }}>TP</option>
                </select>
                @error('type')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="teacher_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Enseignant Responsable</label>
                <select name="teacher_id" id="teacher_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="">Sélectionnez un enseignant</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ old('teacher_id', $note->teacher_id) == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                    @endforeach
                </select>
                @error('teacher_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-8 flex justify-center">
                <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">
                    {{ $note->exists ? 'Modifier' : 'Ajouter' }}
                </button>
            </div>
        </form>
    </div>

@endsection
