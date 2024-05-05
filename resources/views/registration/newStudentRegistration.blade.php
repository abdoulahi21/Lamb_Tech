<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription d'un étudiant</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
    <div class="flex flex-col sm:flex-row justify-between items-center">
        <h1 class="text-3xl font-bold">Inscription d'un étudiant</h1>
        <a href="{{--{{ route('students.index') }}--}}" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg mt-4 sm:mt-0">Retour</a>
    </div>
    <div class="mt-8">
        <!-- Navigation des onglets -->
        <div class="flex border-b border-gray-200 dark:border-gray-700">
            <button id="personal-tab" class="tab-button w-1/3 py-4 px-6 text-sm font-medium text-center text-gray-900 dark:text-gray-100 border-b-2 border-blue-500 dark:border-blue-400">
                Informations Personnelles
            </button>
            <button id="parents-tab" class="tab-button w-1/3 py-4 px-6 text-sm font-medium text-center text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600 focus:z-10 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-500 dark:focus:border-blue-500">
                Informations des Parents
            </button>
            <button id="enrollment-tab" class="tab-button w-1/3 py-4 px-6 text-sm font-medium text-center text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600 focus:z-10 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-500 dark:focus:border-blue-500">
                Informations d'Inscription
            </button>
        </div>
        <form action="{{--{{ route('students.store') }}--}}" id="student-registration-form" method="POST" enctype="multipart/form-data" class="mt-6">
            @csrf
            <!-- Première partie du formulaire sur les informations personnelles -->
            <div id="personal-info" class="form-section">
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
            </div>
            <!-- Deuxième partie du formulaire sur les informations des parents -->
            <div id="parents-info" class="form-section">
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-6 mt-6 w-full mx-auto">
                    <h2 class="text-xl font-bold mb-8">Informations des Parents</h2>

                    <!-- Ajoutez ici les champs pour les informations des parents -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="parent_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom & Prénom</label>
                            <input type="text" name="parent_name" id="parent_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                        </div>
                        <div>
                            <label for="parent_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="parent_email" id="parent_email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label for="parent_phone" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Téléphone:</label>
                            <input type="text" name="parent_phone" id="parent_phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-456-7890" required>
                        </div>
                        <div>
                            <label for="parent_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Adresse</label>
                            <input type="text" name="parent_address" id="parent_address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Troisième partie du formulaire sur les informations d'inscription -->
            <div id="enrollment-info" class="form-section">
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-6 mt-6 w-11/12 mx-auto">
                    <h2 class="text-xl font-bold mb-8">Informations d'Inscription</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="profile_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Profil</label>
                            <select id="profile_id" name="profile_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                                <option value="">Sélectionner un profil</option>
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
                        <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                            <option value="active">active</option>
                            <option value="inactive">inactive</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <label for="documents" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Documents (facultatif)</label>
                        <input id="documents" name="documents[]" type="file" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" multiple>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="mt-8 flex justify-center">
        <button type="submit" form="student-registration-form" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">
            Inscrire l'étudiant
        </button>
    </div>
@endsection

<script>
    $(document).ready(function() {
        // Fonction pour afficher/cacher les sections du formulaire
        function showSection(sectionId) {
            $('.form-section').hide();
            $(sectionId).show();
        }

        // Événement au clic sur les onglets
        $('.tab-button').click(function() {
            // Supprimer la classe active des autres onglets
            $('.tab-button').removeClass('border-blue-500 dark:border-blue-400 text-gray-900 dark:text-gray-100');
            $('.tab-button').addClass('text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600 focus:z-10 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-500 dark:focus:border-blue-500');

            // Ajouter la classe active à l'onglet cliqué
            $(this).addClass('border-blue-500 dark:border-blue-400 text-gray-900 dark:text-gray-100');
            $(this).removeClass('text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600 focus:z-10 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-500 dark:focus:border-blue-500');

            // Afficher/cacher les sections du formulaire
            if ($(this).attr('id') === 'personal-tab') {
                showSection('#personal-info');
            } else if ($(this).attr('id') === 'parents-tab') {
                showSection('#parents-info');
            } else if ($(this).attr('id') === 'enrollment-tab') {
                showSection('#enrollment-info');
            }
        });
    });
</script>
</body>
</html>
