@extends('layouts.layout')
@section('content')
<div class="card">
    <div class="card-header">Créer un nouveau Quiz</div>
    <div class="card-body">
        <form action="{{ route('quizzes.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="titre">Titre du Quiz</label>
                <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror"
                       value="{{ old('titre') }}" required>
                @error('titre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="chapitre_id">Chapitre</label>
                <select name="chapitre_id" class="form-control @error('chapitre_id') is-invalid @enderror" required>
                    <option value="">Sélectionnez un chapitre</option>
                    @foreach($chapitres as $chapitre)
                        <option value="{{ $chapitre->id }}" {{ old('chapitre_id') == $chapitre->id ? 'selected' : '' }}>
                            {{ $chapitre->titre }}
                        </option>
                    @endforeach
                </select>
                @error('chapitre_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div id="questions-container">
                @for($i = 0; $i < 10; $i++)
                <div class="question-block card mb-4">
                    <div class="card-header">
                        Question {{ $i + 1 }}
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Question</label>
                            <input type="text" name="questions[{{ $i }}][question]"
                                   class="form-control @error('questions.{{ $i }}.question') is-invalid @enderror" required>
                            @error("questions.{{ $i }}.question")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="options">
                            <div class="form-group mb-2">
                                <label>Option A</label>
                                <input type="text" name="questions[{{ $i }}][option_a]"
                                       class="form-control @error('questions.{{ $i }}.option_a') is-invalid @enderror" required>
                                @error("questions.{{ $i }}.option_a")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label>Option B</label>
                                <input type="text" name="questions[{{ $i }}][option_b]"
                                       class="form-control @error('questions.{{ $i }}.option_b') is-invalid @enderror" required>
                                @error("questions.{{ $i }}.option_b")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label>Option C</label>
                                <input type="text" name="questions[{{ $i }}][option_c]"
                                       class="form-control @error('questions.{{ $i }}.option_c') is-invalid @enderror" required>
                                @error("questions.{{ $i }}.option_c")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label>Option D</label>
                                <input type="text" name="questions[{{ $i }}][option_d]"
                                       class="form-control @error('questions.{{ $i }}.option_d') is-invalid @enderror" required>
                                @error("questions.{{ $i }}.option_d")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Réponse correcte</label>
                            <select name="questions[{{ $i }}][correct_answer]"
                                    class="form-control @error('questions.{{ $i }}.correct_answer') is-invalid @enderror" required>
                                <option value="">Sélectionnez la bonne réponse</option>
                                <option value="A" {{ old("questions.$i.correct_answer") == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ old("questions.$i.correct_answer") == 'B' ? 'selected' : '' }}>B</option>
                                <option value="C" {{ old("questions.$i.correct_answer") == 'C' ? 'selected' : '' }}>C</option>
                                <option value="D" {{ old("questions.$i.correct_answer") == 'D' ? 'selected' : '' }}>D</option>
                            </select>
                            @error("questions.{{ $i }}.correct_answer")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Créer le Quiz</button>
                <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </form>
    </div>
</div>
@endsection
