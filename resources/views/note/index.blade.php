@extends('dashboard')

@section('title', 'Liste des notes')

@section('contents')

    <div class="flex justify-between">
        <h1 class="text-3xl font-bold">Liste des notes</h1>
        <a href="{{ route('manager.note.create') }}" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Ajouter une note</a>
    </div>

    <div class="mt-8">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Note</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cours</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Appréciation</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Étudiant</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Enseignant</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Semestre</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($notes as $note)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $note->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $note->note }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $note->course_id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $note->type }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $note->appreciation }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $note->student_id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $note->teacher_id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $note->semester }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

