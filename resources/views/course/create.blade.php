@extends('dashboard')

@section('title', $courses->exists ? 'Modifier une cour' : 'Ajouter une cour')

@section('contents')

    <div class="flex justify-between">
        <h1 class="text-3xl font-bold">{{ $courses->exists ? 'Update Class' : 'Add Class' }}</h1>
        <a href="{{ url()->previous() }}" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Retour</a>
    </div>

    <div class="mt-8">
        <form action="{{ $courses->exists ? route('manager.course.update', $courses) : route('manager.course.store') }}" method="POST">
            @csrf
            @if($courses->exists)
                @method('PATCH')
            @endif

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                <input type="text" name="name" id="name" value="{{ old('name', $courses->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                <input type="text" name="description" id="description" value="{{ old('description', $courses->description) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="coeff" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Coefficient</label>
                <input type="number" name="coeff" id="coeff" value="{{ old('coeff', $courses->coeff) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @error('coeff')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="profile_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Enseignant Responsable</label>
                <select name="profile_id" id="teacher_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="">Sélectionnez un enseignant</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ old('profile_id', $courses->profile_id) == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                    @endforeach
                </select>
                @error('profile_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-8 flex justify-center">
                <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">
                    {{ $courses->exists ? 'Modifier' : 'Ajouter' }}
                </button>
            </div>
        </form>
    </div>

@endsection

