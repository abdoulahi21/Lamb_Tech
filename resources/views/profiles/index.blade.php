@extends('dashboard')

@section('title', 'Profils')

@section('contents')

    <div class="flex justify-between">
        <h1 class="text-3xl font-bold">Profils</h1>
        <a href="{{ route('manager.profile.create') }}" class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Ajouter un profil</a>
    </div>

    <div class="flex flex-col mt-8">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                Nom
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                Téléphone
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                Genre
                            </th>

                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                Rôle
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @foreach($profiles as $profile)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $profile->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $profile->phone }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($profile->user)
                                        {{ $profile->user->email }}
                                    @else
                                        <span>Email non défini</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $profile->gender }}
                                    </div>
                                </td>
{{--                                <td class="px-6 py-4 whitespace-nowrap">--}}
{{--                                    @if($profile->user && $profile->user->photo)--}}
{{--                                        <img src="{{ asset('storage/' . $profile->image) }}" alt="Photo de profil" class="h-8 w-8 rounded-full">--}}
{{--                                    @else--}}
{{--                                        <span>Aucune photo</span>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($profile->user)
                                        {{ $profile->user->role }}
                                    @else
                                        <span>Non défini</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('manager.profile.edit', $profile) }}" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
