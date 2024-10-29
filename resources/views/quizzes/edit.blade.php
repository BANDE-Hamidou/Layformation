<!-- resources/views/quizzes/edit.blade.php -->
@extends('layouts.layout')
@section('content')
<div class="card">
    <div class="card-header">Modifier le Quiz</div>
    <div class="card-body">
        <form action="{{ route('quizzes.update', $quiz->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="chapitre_id">Chapitre</label>
                <select name="chapitre_id" class="form-control @error('chapitre_id') is-invalid @enderror" required>
                    <option value="">Sélectionnez un chapitre</option>
                    @foreach($chapitres as $chapitre)
                        <option value="{{ $chapitre->id }}"
                            {{ (old('chapitre_id', $quiz->chapitre_id) == $chapitre->id) ? 'selected' : '' }}>
                            {{ $chapitre->titre }}
                        </option>
                    @endforeach
                </select>
                @error('chapitre_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="question">Question</label>
                <input type="text" name="question" class="form-control @error('question') is-invalid @enderror"
                       value="{{ old('question', $quiz->question) }}" required>
                @error('question')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label>Options</label>
                <div id="options-container">
                    @foreach(old('options', $quiz->options) as $index => $option)
                        <div class="option-group mb-2">
                            <input type="text" name="options[]" class="form-control @error('options.'.$index) is-invalid @enderror"
                                   value="{{ $option }}" required>
                            @error('options.'.$index)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach
                </div>
                <button type="button" onclick="addOption()" class="btn btn-secondary mt-2">
                    Ajouter une option
                </button>
            </div>

            <div class="form-group mb-3">
                <label for="correct_option">Réponse correcte</label>
                <input type="text" name="correct_option" class="form-control @error('correct_option') is-invalid @enderror"
                       value="{{ old('correct_option', $quiz->correct_option) }}" required>
                @error('correct_option')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">Retour</a>
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>

<script>
function addOption() {
    const container = document.getElementById('options-container');
    const div = document.createElement('div');
    div.className = 'option-group mb-2';
    div.innerHTML = `
        <input type="text" name="options[]" class="form-control" required>
    `;
    container.appendChild(div);
}
</script>
@endsection
