@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">Liste des Chapitres</div>
    <div class="createbtn-search">
        <div class="createbtn">
            <a class="btn btn-success" href="{{ route('chapitres.create') }}">Créer un nouveau chapitre</a>
        </div>

        <form action="{{ route('chapitres.index') }}" method="GET" class="recherche">
            <input type="text" name="search" placeholder="Rechercher un chapitre" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Module</th>
                <th>Vidéo</th> <!-- Nouvelle colonne pour la vidéo -->
                <th width="350px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chapitres as $chapitre)
                <tr>
                    <td>{{ $chapitre->id }}</td>
                    <td>{{ $chapitre->titre }}</td>
                    <td>{{ $chapitre->module->titre }}</td>
                    <td>
                        @if($chapitre->chemin_video)
                            <video width="150" height="80" controls preload="metadata">
                                <source src="{{ asset('storage/'.$chapitre->chemin_video) }}" type="video/mp4">
                                Votre navigateur ne supporte pas la lecture vidéo.
                            </video>
                            <br>
                            <a href="{{ asset('storage/'.$chapitre->chemin_video) }}" class="btn btn-secondary" download>
                                Télécharger la vidéo
                            </a>
                        @else
                            Aucune vidéo
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('chapitres.destroy', $chapitre->id) }}" method="POST" style="display:inline;">
                            <a href="{{ route('chapitres.show', $chapitre->id) }}" class="btn b1">Voir</a>
                            <a href="{{ route('chapitres.edit', $chapitre->id) }}" class="btn b2">Modifier</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn b3">Supprimer</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
