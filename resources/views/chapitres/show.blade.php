@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="affich" >
        <div>
            @if ($chapitre->chemin_video)
                <p><strong>Vidéo :</strong></p>
                <video width="750" height="520" controls>
                    <source src="{{ asset('storage/' . $chapitre->chemin_video) }}" type="video/mp4">
                    Votre navigateur ne supporte pas la lecture de vidéos.
                </video>
            @endif
        </div>
        <div class="row justify-content-center">
            <h2>{{ $chapitre->titre }}</h2>

            <p><strong>Description :</strong> {{ $chapitre->description }}</p>
            <p><strong>Module :</strong> {{ $chapitre->module->titre }}</p>
        </div>

    </div>

    <a href="{{ route('chapitres.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection
