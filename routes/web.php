<?php

use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FacturationController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    User::create([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' =>\Illuminate\Support\Facades\Hash::make('passer'),
        'role' => 'admin'
        ]);
    return view('registration.newStudentRegistration');

});

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'doLogin']);
Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::prefix('manager')->group(function () {
    Route::resource('communication', CommunicationController::class);
    Route::resource('course', CourseController::class);
    Route::resource('facturation', FacturationController::class);
    Route::resource('note', NoteController::class);
    Route::resource('schoolclass', SchoolClassController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('planning', PlanningController::class);
    Route::resource('registration', RegistrationController::class);
    Route::resource('user', UserController::class);
});
