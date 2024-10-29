<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Module;
use App\Http\Requests\StoreChapitreRequest;
use App\Http\Requests\UpdateChapitreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ChapitreController extends Controller
{
    // Afficher la liste des chapitres
    public function index(Request $request): View
    {
        $search = $request->input('search'); // Recherche si un terme est spécifié

        // Recherche des chapitres selon les critères
        $chapitres = Chapitre::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('titre', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $noResults = $chapitres->isEmpty();

        return view('chapitres.index', compact('chapitres', 'noResults'));
    }

    // Afficher le formulaire de création d'un chapitre
    public function create(): View
    {
        // Récupérer tous les modules pour les afficher dans le formulaire
        $modules = Module::all();
        return view('chapitres.create', compact('modules'));
    
    }

    // Stocker un nouveau chapitre
    public function store(StoreChapitreRequest $request): RedirectResponse
<<<<<<< HEAD
    {
        // Gérer le téléchargement de la vidéo
        $videoPath = $request->hasFile('chemin_video') 
            ? $request->file('chemin_video')->store('videos', 'public') 
            : null;
=======
{
    $videoPath = null;
    if ($request->hasFile('chemin_video')) {
        $video = $request->file('chemin_video');
>>>>>>> origin/main

        // Vérifions que le fichier est valide
        if ($video->isValid()) {
            $videoPath = $video->store('videos', 'public');

            // Vérifions que le fichier a bien été enregistré
            if (!Storage::disk('public')->exists($videoPath)) {
                return back()->with('error', 'Erreur lors de l\'enregistrement de la vidéo');
            }
        }
    }

    Chapitre::create(array_merge($request->validated(), ['chemin_video' => $videoPath]));
    return redirect()->route('chapitres.index')->with('success', 'Chapitre créé avec succès.');
}

    // Afficher un chapitre spécifique
    public function show(Chapitre $chapitre): View
    {
        // Charger le module associé au chapitre
        $module = $chapitre->module; // Assurez-vous que la relation 'module' est définie dans le modèle Chapitre
        return view('chapitres.show', compact('chapitre', 'module'));
    }

    // Afficher le formulaire d'édition d'un chapitre
    public function edit(Chapitre $chapitre): View
    {
        // Récupérer tous les modules pour les afficher dans le formulaire
        $modules = Module::all();
        return view('chapitres.edit', compact('chapitre', 'modules'));
    }

    // Mettre à jour un chapitre
    public function update(UpdateChapitreRequest $request, Chapitre $chapitre): RedirectResponse
{
    // Créer un tableau avec les données validées
    $validated = $request->validated();

    // Gérer le téléchargement de la vidéo si une nouvelle vidéo est fournie
    if ($request->hasFile('chemin_video')) {
        // Supprimer l'ancienne vidéo si elle existe
        if ($chapitre->chemin_video && Storage::disk('public')->exists($chapitre->chemin_video)) {
            Storage::disk('public')->delete($chapitre->chemin_video);
        }

        // Enregistrer la nouvelle vidéo
        $videoPath = $request->file('chemin_video')->store('videos', 'public');

        // Ajouter le nouveau chemin aux données validées
        $validated['chemin_video'] = $videoPath;
    } else {
        // Garder l'ancien chemin de la vidéo si aucune nouvelle vidéo n'est fournie
        $validated['chemin_video'] = $chapitre->chemin_video;
    }

    // Mettre à jour le chapitre avec toutes les données
    $chapitre->update($validated);

    return redirect()->route('chapitres.index')->with('success', 'Chapitre mis à jour avec succès.');
}



    // Supprimer un chapitre
    public function destroy(Chapitre $chapitre): RedirectResponse
    {
        // Supprimer la vidéo si elle existe
        if ($chapitre->chemin_video) {
            Storage::disk('public')->delete($chapitre->chemin_video);
        }

        // Supprimer le chapitre
        $chapitre->delete();
        return redirect()->route('chapitres.index')->with('success', 'Chapitre supprimé avec succès.');
    }
   
    

}
