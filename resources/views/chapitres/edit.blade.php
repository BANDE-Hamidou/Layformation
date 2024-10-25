@extends('layouts.layout')

@section('content')
<div class="card1">
    <div class="card-header">Modifier le Chapitre</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('chapitres.update', $chapitre->id) }}" method="POST" enctype="multipart/form-data" class="form-container"> <!-- Ajout de l'enctype pour le téléchargement de fichier -->
        @csrf
        @method('PUT')

        <!-- Titre du chapitre -->
        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" class="form-control" value="{{ old('titre', $chapitre->titre) }}" required>
        </div>

        <!-- Sélection du module -->
        <div class="form-group">
            <label for="module_id">Module :</label>
            <select name="module_id" class="form-control" required>
                <option value="">--Sélectionnez un module--</option>
                @foreach($modules as $module)
                    <option value="{{ $module->id }}" {{ old('module_id', $chapitre->module_id) == $module->id ? 'selected' : '' }}>
                        {{ $module->titre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Description du chapitre -->
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $chapitre->description) }}</textarea>
        </div>

        <!-- Téléchargement de la vidéo -->
        <div class="form-group">
            <label for="chemin_video">Télécharger la vidéo:</label>
            <input type="file" id="chemin_video" name="chemin_video" accept="video/*"> <!-- Champ pour télécharger la vidéo -->
        </div>

        <!-- Bouton de mise à jour -->
        <button type="submit" class="btn btn-success">Mettre à Jour</button>
    </form>
</div>
@endsection
