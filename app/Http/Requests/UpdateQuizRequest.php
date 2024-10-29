<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuizRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titre' => 'required|string|max:255',
            'chapitre_id' => 'required|exists:chapitres,id',
            'questions' => 'required|array|min:1',
            'questions.*.question' => 'required|string|max:255',
            'questions.*.option_a' => 'required|string|max:255',
            'questions.*.option_b' => 'required|string|max:255',
            'questions.*.option_c' => 'required|string|max:255',
            'questions.*.option_d' => 'required|string|max:255',
            'questions.*.correct_answer' => 'required|in:A,B,C,D',
        ];
    }

    public function messages()
    {
        return [
            'titre.required' => 'Le titre du quiz est obligatoire',
            'titre.max' => 'Le titre ne doit pas dépasser 255 caractères',
            'chapitre_id.required' => 'Le chapitre est obligatoire',
            'chapitre_id.exists' => 'Le chapitre sélectionné n\'existe pas',
            'questions.required' => 'Au moins une question est requise',
            'questions.min' => 'Le quiz doit contenir au moins une question',
            'questions.*.question.required' => 'La question est obligatoire',
            'questions.*.question.max' => 'La question ne doit pas dépasser 255 caractères',
            'questions.*.option_a.required' => 'L\'option A est obligatoire',
            'questions.*.option_b.required' => 'L\'option B est obligatoire',
            'questions.*.option_c.required' => 'L\'option C est obligatoire',
            'questions.*.option_d.required' => 'L\'option D est obligatoire',
            'questions.*.correct_answer.required' => 'La réponse correcte est obligatoire',
            'questions.*.correct_answer.in' => 'La réponse correcte doit être A, B, C ou D',
        ];
    }
}
