@extends('dashboard')

@section('title', 'Inscription d\'un étudiant')

@section('contents')
    <div class="flex flex-col sm:flex-row justify-between items-center">
        <h1 class="text-3xl font-bold">Inscription d'un étudiant</h1>
        <a href="{{--{{ route('students.index') }}--}}" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg mt-4 sm:mt-0">Retour</a>
    </div>

    <div class="mt-8">
        <form action="{{--{{ route('students.store') }}--}}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Première partie du formulaire sur les informations personnelles entourée d'un div avec border et ombre -->
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-6 mt-6 w-full mx-auto">
                <h2 class="text-xl font-bold mb-8">Informations Personnelles</h2>

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
                        <label for="phone" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Téléphone:</label>
                        <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-456-7890" required>
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Adresse</label>
                        <input type="text" name="address" id="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="date_of_birth" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date de Naissance</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    </div>

                    {{-- place_of_birth --}}
                    <div>
                        <label for="place_of_birth" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lieu de Naissance</label>
                        <input type="text" name="place_of_birth" id="place_of_birth" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
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
            </div>
            <!-- Fin première partie -->

            <!-- Deuxième partie du formulaire sur les informations des parents entourée d'un div avec border et ombre -->
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-6 mt-6 w-full mx-auto">
                <h2 class="text-xl font-bold mb-8">Informations des Parents</h2>

                <!-- Ajoutez ici les champs pour les informations des parents -->
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
                        <label for="phone" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Téléphone:</label>
                        <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-456-7890" required>
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Adresse</label>
                        <input type="text" name="address" id="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    </div>
                </div>

            </div>
            <!-- Fin deuxième partie -->

            <!-- Troisième partie du formulaire sur les informations d'inscription entourée d'un div avec border et ombre -->
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-6 mt-6 w-11/12 mx-auto">
                <h2 class="text-xl font-bold mb-8">Informations d'Inscription</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="profile_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Profil</label>
                        <select id="profile_id" name="profile_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                            <option value="">Sélectionner un profil</option>
                            <!-- Ajoutez ici les options pour les profils -->
                        </select>
                    </div>

                    <div>
                        <label for="schoolclass_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Classe</label>
                        <select id="schoolclass_id" name="schoolclass_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                            <option value="">Sélectionner une classe</option>
                            <!-- Ajoutez ici les options pour les classes -->
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <label for="academic_year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Année académique</label>
                    <input id="academic_year" name="academic_year" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                </div>

                <div class="mt-4">
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Statut</label>
                    <input id="status" name="status" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                </div>

                <div class="mt-4">
                    <label for="documents" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Documents (facultatif)</label>
                    <input id="documents" name="documents[]" type="file" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" multiple>
                </div>
            </div>
            <!-- Fin troisième partie -->


            <div class="mt-8 flex justify-center">
                <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">
                    Inscrire l'étudiant
                </button>
            </div>
        </form>
    </div>
@endsection
