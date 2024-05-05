@extends('dashboard')

@section('title', $schoolClass->exists ? 'Modifier une classe' : 'Ajouter une classe')

@section('contents')

    <div class="flex justify-between">
        <h1 class="text-3xl font-bold">{{ $schoolClass->exists ? 'Update Class' : 'Add Class' }}</h1>
        <a href="{{ url()->previous() }}" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Retour</a>
    </div>

    <div class="mt-8">
        <form action="{{ $schoolClass->exists ? route('manager.schoolclass.update', $schoolClass) : route('manager.schoolclass.store') }}" method="POST">
            @csrf
            @if($schoolClass->exists)
                @method('PATCH')
            @endif

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                <input type="text" name="name" id="name" value="{{ old('name', $schoolClass->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="level" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Niveau</label>
                <select name="level" id="level" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="">Sélectionner le niveau</option>
                    <option value="Licence 1" {{ old('level', $schoolClass->level) === 'Licence 1' ? 'selected' : '' }}>Licence 1</option>
                    <option value="Licence 2" {{ old('level', $schoolClass->level) === 'Licence 2' ? 'selected' : '' }}>Licence 2</option>
                    <option value="Licence 3" {{ old('level', $schoolClass->level) === 'Licence 3' ? 'selected' : '' }}>Licence 3</option>
                    <option value="Master 1" {{ old('level', $schoolClass->level) === 'Master 1' ? 'selected' : '' }}>Master 1</option>
                    <option value="Master 2" {{ old('level', $schoolClass->level) === 'Master 2' ? 'selected' : '' }}>Master 2</option>
                </select>
                @error('level')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mt-4">
                <label for="monthly_amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Montant mensuel</label>
                <input type="text" name="monthly_amount" id="monthly_amount" value="{{ old('monthly_amount', $schoolClass->monthly_amount) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @error('monthly_amount')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="registration_amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Montant d'inscription</label>
                <input type="text" name="registration_amount" id="registration_amount" value="{{ old('registration_amount', $schoolClass->registration_amount) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @error('registration_amount')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="month_required" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mois requis</label>
                <input type="text" name="month_required" id="month_required" value="{{ old('month_required', $schoolClass->month_required) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                @error('month_required')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="teacher_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Enseignant</label>
                <select name="teacher_id" id="teacher_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="">Sélectionnez un enseignant</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ old('teacher_id', $schoolClass->teacher_id) == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                    @endforeach
                </select>
                @error('teacher_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-8 flex justify-center">
                <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">
                    {{ $schoolClass->exists ? 'Modifier' : 'Ajouter' }}
                </button>
            </div>
        </form>
    </div>

@endsection
