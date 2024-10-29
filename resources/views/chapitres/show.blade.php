@extends('layouts.layout')

@section('content')
<<<<<<< HEAD
    <h1>{{ $chapitre->titre }}</h1>
    <p>{{ $chapitre->description }}</p>

    <h2>Vidéos :</h2>
    @foreach ($chapitre->videos as $video)
        <div>
            <h3>{{ $video->titre }}</h3>
            <video width="320" height="240" controls>
                <source src="{{ asset('path_to_your_video_directory/' . $video->fichier) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    @endforeach
=======
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
>>>>>>> origin/main
@endsection
