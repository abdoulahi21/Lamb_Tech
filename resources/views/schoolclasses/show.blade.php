@extends('dashboard')

@section('title', 'Classes')

@section('contents')
    <div class="container">
        <h1>Liste des étudiants de la classe {{ $classe->name }}</h1>

        <table class="table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
