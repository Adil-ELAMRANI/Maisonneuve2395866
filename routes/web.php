<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CityController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Affiche tous les étudiants
Route::get('/', [StudentController::class, 'index'])->name('students.index');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Formulaire pour créer un nouvel étudiant
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

// Enregistre un nouvel étudiant
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// Affiche un étudiant
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

// Formulaire pour modifier un étudiant
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');

// Met à jour un étudiant
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');

// Supprime un étudiant
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');


Route::get('city', [CityController::class, 'index'])->name('city.index');

// Route pour la liste des villes
Route::get('/villes', [CityController::class, 'index'])->name('cities.index');