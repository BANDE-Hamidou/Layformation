@extends('layouts.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ $quiz->titre }}</h3>
        <p class="text-muted">Chapitre : {{ $quiz->chapitre->titre }}</p>
    </div>

    <div class="card-body">
        <form id="quiz-form">
            @csrf
            @if(!empty($quiz->questions) && is_iterable($quiz->questions))
                @foreach($quiz->questions as $index => $question)
                    <div class="question-block mb-4">
                        <h5>Question {{ $index + 1 }}</h5>
                        <p class="question-text">{{ is_array($question) ? $question['question'] : $question->question }}</p>

                        <div class="options-list">
                            @php
                                $questionId = is_array($question) ? $question['id'] : $question->id;
                            @endphp
                            <div class="form-check">
                                <input type="radio" name="answers[{{ $questionId }}]" value="A" class="form-check-input" id="q{{ $questionId }}_a" required>
                                <label class="form-check-label" for="q{{ $questionId }}_a">
                                    A) {{ is_array($question) ? $question['option_a'] : $question->option_a }}
                                </label>
                            </div>

                            <div class="form-check">
                                <input type="radio" name="answers[{{ $questionId }}]" value="B" class="form-check-input" id="q{{ $questionId }}_b">
                                <label class="form-check-label" for="q{{ $questionId }}_b">
                                    B) {{ is_array($question) ? $question['option_b'] : $question->option_b }}
                                </label>
                            </div>

                            <div class="form-check">
                                <input type="radio" name="answers[{{ $questionId }}]" value="C" class="form-check-input" id="q{{ $questionId }}_c">
                                <label class="form-check-label" for="q{{ $questionId }}_c">
                                    C) {{ is_array($question) ? $question['option_c'] : $question->option_c }}
                                </label>
                            </div>

                            <div class="form-check">
                                <input type="radio" name="answers[{{ $questionId }}]" value="D" class="form-check-input" id="q{{ $questionId }}_d">
                                <label class="form-check-label" for="q{{ $questionId }}_d">
                                    D) {{ is_array($question) ? $question['option_d'] : $question->option_d }}
                                </label>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Aucune question n'est disponible pour ce quiz.</p>
            @endif

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Soumettre le Quiz</button>
                <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">Retour à la liste</a>
            </div>
        </form>
    </div>
</div>
@endsection
