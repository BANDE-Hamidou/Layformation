<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\EtudiantController;
use App\Models\Domaine;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResourceController;

// Routes d'authentification
Auth::routes();

// Page d'accueil
Route::get('/', function () {
    return view('home');
})->name('home');

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

Route::get('/modules', [ModuleController::class, 'index'])->name('modules');

// Page du tableau de bord
Route::get('/dashboard', function () {
    return view('components.dashboard');
})->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Ressources
Route::resource('formations', FormationController::class);
Route::resource('formateurs', FormateurController::class);
Route::resource('etudiants', EtudiantController::class);
Route::resource('domaines', DomaineController::class);
Route::resource('modules', ModuleController::class);

// Routes spécifiques pour les domaines et les modules
Route::get('domaines/{domaine}/formations', [DomaineController::class, 'formations'])->name('domaines.formations');
Route::get('modules', [ModuleController::class, 'modules'])->name('partials.modules');
Route::get('/modules', [ModuleController::class, 'index'])->name('modules');

// Route pour récupérer le domaine d'une formation (facultatif)
Route::get('formations/{formation}/domaine', [FormationController::class, 'showDomaine'])->name('formations.domaine');

// Autres routes pour les modules
Route::get('/modules/create', [ModuleController::class, 'create'])->name('modules.create');
Route::post('/modules', [ModuleController::class, 'store'])->name('modules.store');
Route::get('/modules/{module}', [ModuleController::class, 'show'])->name('modules.show');
Route::get('/modules/{module}/edit', [ModuleController::class, 'edit'])->name('modules.edit');
Route::put('/modules/{module}', [ModuleController::class, 'update'])->name('modules.update');
Route::delete('/modules/{module}', [ModuleController::class, 'destroy'])->name('modules.destroy');
Route::resource('modules', ModuleController::class);

Route::get('/mes-cours', function () {
    return view('partials.mes-cours'); // Vue pour mes cours
})->name('mes-cours');

Route::get('/mes-paiements', function () {
    return view('partials.mes-paiements'); // Vue pour mes paiements
})->name('mes-paiements');

Route::get('/mes-certificats', function () {
    return view('partials.mes-certificats'); // Vue pour mes certificats et attestations
})->name('mes-certificats');


// Routes pour les Modules
Route::resource('modules', ModuleController::class);

// Routes pour les Chapitres
Route::resource('chapitres', ChapitreController::class);

// Routes pour les Quiz
Route::resource('quiz', QuizController::class);

Route::resource('resources', ResourceController::class);

Route::get('/chapitres', [ChapitreController::class, 'index'])->name('chapitres.index');

