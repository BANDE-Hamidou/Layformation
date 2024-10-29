<?php
namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Chapitre;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('chapitre')->paginate(10);
        return view('quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $chapitres = Chapitre::all();
        return view('quizzes.create', compact('chapitres'));
    }

    public function store(StoreQuizRequest $request)
    {
        $validatedData = $request->validated();

        // Créer le quiz avec les données validées
        $quiz = Quiz::create([
            'titre' => $validatedData['titre'],
            'chapitre_id' => $validatedData['chapitre_id'],
            'questions' => $validatedData['questions']
        ]);

        return redirect()
            ->route('quizzes.index')
            ->with('success', 'Quiz créé avec succès');
    }

    public function show(Quiz $quiz)
    {
        return view('quizzes.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {
        $chapitres = Chapitre::all();
        return view('quizzes.edit', compact('quiz', 'chapitres'));
    }

    public function update(UpdateQuizRequest $request, Quiz $quiz)
    {
        $validatedData = $request->validated();

        $quiz->update([
            'titre' => $validatedData['titre'],
            'chapitre_id' => $validatedData['chapitre_id'],
            'questions' => $validatedData['questions']
        ]);

        return redirect()
            ->route('quizzes.index')
            ->with('success', 'Quiz mis à jour avec succès');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()
            ->route('quizzes.index')
            ->with('success', 'Quiz supprimé avec succès');
    }

    public function verifyAnswer(Request $request, Quiz $quiz)
    {
        $questionIndex = $request->input('question_index');
        $userAnswer = $request->input('answer');

        // Récupérer la question spécifique du quiz
        $questions = $quiz->questions;
        $question = $questions[$questionIndex] ?? null;

        if (!$question) {
            return response()->json([
                'success' => false,
                'message' => 'Question non trouvée'
            ]);
        }

        $isCorrect = $question['correct_answer'] === $userAnswer;

        return response()->json([
            'success' => true,
            'correct' => $isCorrect,
            'message' => $isCorrect ? 'Bonne réponse !' : 'Mauvaise réponse. Essayez encore !'
        ]);
    }
}
