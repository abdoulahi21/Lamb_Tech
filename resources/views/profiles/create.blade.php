@extends('dashboard')

@section('title', 'Ajout d\'un Profil')

@section('contents')
    <div class="flex flex-col sm:flex-row justify-between items-center">
        <h1 class="text-3xl font-bold">Ajout d'un Profil</h1>
        <a href="{{ route('manager.profile.index') }}" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg mt-4 sm:mt-0">Retour</a>
    </div>

    <form action="{{ route('manager.profile.store') }}" method="POST" enctype="multipart/form-data" class="mt-6">
        @csrf

        <!-- Informations personnelles -->
        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-6 mt-6 w-full mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom & Prénom</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Téléphone</label>
                    <input type="text" name="phone" id="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                </div>
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Genre</label>
                    <select name="gender" id="gender" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="masculin">Masculin</option>
                        <option value="feminin">Féminin</option>
                    </select>
                </div>
            </div>

            <div>
                <!-- Champ pour le rôle avec la valeur "professeur" et en lecture seule -->
                <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rôle</label>
                <select name="role" id="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" readonly>
                    <option value="professeur" selected>Professeur</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
            <div>
                <!--  Ajout de l'image          -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>
            </div>
        </div>

        <!-- Bouton de soumission -->
        <div class="mt-8 flex justify-center">
            <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Ajouter un professeur</button>
        </div>
    </form>
@endsection
