<!-- resources/views/quizzes/index.blade.php -->
@extends('layouts.layout')
@section('content')
<div class="card">
    <div class="card-header">Liste des Quiz</div>
    <div class="createbtn-search">
        <div class="createbtn">
            <a class="btn btn-success" href="{{ route('quizzes.create') }}">Créer un nouveau Quiz</a>
        </div>
        <form action="{{ route('quizzes.index') }}" method="GET" class="recherche">
            <input type="text" name="search" placeholder="Rechercher un quiz" value="{{ request()->query('search') }}" class="form-control">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Chapitre</th>
                <th width="350px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($quizzes as $quiz)
            <tr>
                <td>{{ $quiz->id }}</td>
                <td>{{ $quiz->question }}</td>
                <td>{{ $quiz->chapitre->titre }}</td>
                <td>
                    <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST" class="action-form">
                        <a class="btn b1" href="{{ route('quizzes.show', $quiz->id) }}">Afficher</a>
                        <a class="btn b2" href="{{ route('quizzes.edit', $quiz->id) }}">Modifier</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn b3" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce quiz ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Aucun quiz disponible.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $quizzes->links() }}
    </div>
</div>
@endsection
