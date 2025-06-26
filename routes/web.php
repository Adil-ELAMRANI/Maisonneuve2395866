<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ForumController;

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

//Route::get('/lang/{locale}', [\App\Http\Controllers\SetLocaleController::class, 'index'])->name('lang');
Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');


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

// Route pour la connexion
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/students', [StudentController::class, 'index'])->name('student.index');

Route::middleware('auth')->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    
});



Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//Route::resource('forum', ArticleController::class);
//Route::resource('forum', App\Http\Controllers\ForumController::class)->middleware('auth');

//Route::resource('forum', \App\Http\Controllers\ArticleController::class)->middleware('auth');
Route::resource('forum', ArticleController::class)->middleware('auth');

Route::resource('documents', \App\Http\Controllers\DocumentController::class)->middleware('auth');
Route::get('documents/{document}/download', [\App\Http\Controllers\DocumentController::class, 'download'])->name('documents.download');

