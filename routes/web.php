<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\EtudiantController;
use App\Models\Domaine;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Routes d'authentification
Auth::routes();

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Pages accessibles directement
Route::get('/formation', function () {
    $domaines = Domaine::all(); // Récupère tous les domaines
    return view('partials.formation', compact('domaines'));
})->name('formation');

Route::get('/inscription', function () {
    return view('partials.inscription');
})->name('inscription')->middleware('auth');

Route::get('/apropos', function () {
    return view('partials.apropos');
})->name('apropos');

Route::get('/blog', function () {
    return view('partials.blog');
})->name('blog');

Route::get('/contact', function () {
    return view('partials.contact');
})->name('contact');

Route::get('/admin', function () {
    return view('components.admin');
})->name('admin');

Route::get('/listecours', function () {
    return view('partials.listecours');
})->name('listecours');

Route::get('/coursinform', function () {
    return view('partials.coursinform');
})->name('coursinform');

Route::get('/energi', function () {
    return view('partials.energi');
})->name('energi');

Route::get('/administ', function () {
    return view('partials.administ');
})->name('administ');

Route::get('/art', function () {
    return view('partials.art');
})->name('art');

Route::get('/log', function () {
    return view('partials.log');
})->name('log');

Route::get('/parcour', function () {
    return view('partials.parcour');
})->name('parcour');

Route::get('/modules', function () {
    return view('partials.modules');
})->name('modules');
Route::get('/modules', [ModuleController::class, 'index'])->name('modules');
// Page du tableau de bord
Route::get('/dashboard', function () {
    return view('components.dashboard');
})->name('dashboard');

// Ressources de formations
Route::resource('formations', FormationController::class);

// Ressources de formateurs
Route::resource('formateurs', FormateurController::class);

// Routes pour les étudiants
Route::resource('etudiants', EtudiantController::class);

// Route pour la page d'accueil après authentification
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ressources de domaines
Route::resource('domaines', DomaineController::class);

// Routes pour récupérer les formations d'un domaine
Route::get('domaines/{domaine}/formations', [DomaineController::class, 'formations'])
    ->name('domaines.formations');
//    module
    Route::get('modules/formations', [ModuleController::class, 'modules'])
    ->name('partials.modules');

// Route pour récupérer le domaine d'une formation (facultatif)
Route::get('formations/{formation}/domaine', [FormationController::class, 'showDomaine'])
    ->name('formations.domaine');

    // Autres routes...
    
    Route::resource('formations', FormationController::class);
    Route::resource('modules', ModuleController::class);
    Route::resource('etudiants', EtudiantController::class);
    Route::resource('formateurs', FormateurController::class);
    Route::resource('domaines', DomaineController::class);
    
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/modules', [ModuleController::class, 'index'])->name('modules'); // Cette ligne définit la route avec le nom 'modules'
Route::resource('modules', ModuleController::class); // Cette ligne gère toutes les routes RESTful pour le ModuleController

// Autres routes...

Route::get('/modules/{module}/edit', [ModuleController::class, 'edit'])->name('modules.edit');

 Route::resource('modules', ModuleController::class);
   
