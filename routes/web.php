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
use App\Http\Controllers\editprofilController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ProgressionController;
use App\Http\Controllers\parcourController;
use App\Http\Controllers\MesCoursController;

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

Route::get('/progression', function () {
    return view('partials.progression');
})->name('progression');


Route::get('/mescours', function () {
    return view('partials.mescours'); // Vue pour mes cours
})->name('mescours');

Route::get('/mescours', [MesCoursController::class, 'index'])->name('mescours');
Route::get('/mes-paiements', function () {
    return view('partials.mes-paiements'); // Vue pour mes paiements
})->name('mes-paiements');

Route::get('/mes-certificats', function () {
    return view('partials.mes-certificats'); // Vue pour mes certificats et attestations
})->name('mes-certificats');

Route::get('/parcour', [ModuleController::class, 'parcour'])->name('modules.parcour');
Route::get('/parcour', [parcourController::class, 'parcour'])->name('parcour');

// Routes pour les Modules
Route::resource('modules', ModuleController::class);

// Routes pour les Chapitres
Route::resource('chapitres', ChapitreController::class);

// Routes pour les Quiz
Route::resource('quizzes', QuizController::class);
Route::post('quizzes/{quiz}/verify-answer', [QuizController::class, 'verifyAnswer'])->name('quizzes.verify-answer');

Route::resource('resources', ResourceController::class);

Route::get('/chapitres', [ChapitreController::class, 'index'])->name('chapitres.index');
Route::get('/editprofil', [editprofilController::class, 'edit'])->name('editprofil');
Route::put('/editprofil', [editprofilController::class, 'update'])->name('editprofil.update');
use App\Http\Controllers\ParcoursController;
use App\Models\Formation;

// Route::get('/parcour/{id}', [parcourController::class, 'parcour'])->name('parcour');

Route::get('/api/modules', [ModuleController::class, 'index']);
Route::get('/chapitres/{chapitre}', [ChapitreController::class, 'show'])->name('chapitres.show');
// Récupérer les chapitres pour un module spécifique
Route::get('/api/modules/{module}/chapitres', [ModuleController::class, 'showChapters']);
Route::get('/parcour', [parcourController::class, 'parcour'])->name('parcour');

Route::get('/resources', [ResourceController::class, 'index'])->name('resources.index');
Route::get('/etudiants/create', [EtudiantController::class, 'create'])->name('etudiants.create');
Route::get('/inscription', [FormationController::class, 'showInscriptionForm'])->name('inscription');

Route::get('/progression', [ProgressionController::class, 'index'])->name('progression');
