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
use App\Models\Profile;
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
   /* Profile::create([
        'name' => 'John Doe',
        'birthday' => '1990-01-01',
        'place_of_birth' => 'New York',
        'phone' => '1234567890',
        'status' => 'active',
        'address' => '123 Main St',
        'genre'  => 'Masculin'
    ]);
    User::create([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' =>\Illuminate\Support\Facades\Hash::make('passer'),
        'role' => 'admin',
        'profile_id' => 1
        ]);
        ]);*/

//    return view('registration.newStudentRegistration');
    return view('welcome');


});

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'doLogin']);
Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::prefix('manager')->name('manager.')->middleware('auth')->group(function () {
    Route::get('/home',function (){
        return view('home');
    })->name('home');
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
