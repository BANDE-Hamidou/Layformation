<?php
namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Chapitre;
use App\Models\Question;
use App\Models\Option; // Assurez-vous d'importer le modèle Option
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $search = $request->input('search'); // Recherche si un terme est spécifié

        if ($search) {
            $quizzes = Quiz::where('titre', 'like', '%' . $search . '%')
                ->with('chapitre')
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        } else {
            $quizzes = Quiz::with('chapitre')->orderBy('created_at', 'desc')->paginate(5);
        }

        // Vérifiez si des quizzes ont été trouvés
        $noResults = $quizzes->isEmpty(); // True si aucun quiz n'a été trouvé

        return view('quiz.index', compact('quizzes', 'search', 'noResults'));
=======
        $quizzes = Quiz::with('chapitre')->paginate(10);
        return view('quizzes.index', compact('quizzes'));
>>>>>>> origin/main
    }

    public function create()
    {
        $chapitres = Chapitre::all();
        return view('quizzes.create', compact('chapitres'));
    }

<<<<<<< HEAD
    // Stocker un nouveau quiz
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'titre' => 'required|string',
            'chapitre_id' => 'required|exists:chapitres,id',
            'questions' => 'required|array|min:10', // S'assurer qu'il y a au moins 10 questions
            'questions.*.text' => 'required|string',
            'questions.*.type' => 'required|string|in:multiple,true_false',
            'questions.*.options' => 'required|array',
            'questions.*.options.*' => 'required|string', // Chaque option doit être une chaîne
        ]);

        // Création du quiz
        $quiz = Quiz::create($request->only(['titre', 'chapitre_id']));

        foreach ($request->questions as $questionData) {
            // Créer les questions avec leurs options ici
            $question = new Question();
            $question->text = $questionData['text'];
            $question->type = $questionData['type'];
            $question->quiz_id = $quiz->id; // Lier le quiz à la question

            $question->save();

            // Sauvegarder les options
            foreach ($questionData['options'] as $optionText) {
                $option = new Option();
                $option->text = $optionText;
                $option->question_id = $question->id; // Lier l'option à la question
                $option->save();
            }
        }

        return redirect()->route('quiz.index')->with('success', 'Quiz créé avec succès.');
=======
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
>>>>>>> origin/main
    }

    public function show(Quiz $quiz)
    {
        return view('quizzes.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {
        $chapitres = Chapitre::all();
<<<<<<< HEAD
        $questions = $quiz->questions; // Récupérer les questions associées au quiz
        return view('quiz.edit', compact('quiz', 'chapitres', 'questions'));
=======
        return view('quizzes.edit', compact('quiz', 'chapitres'));
>>>>>>> origin/main
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
