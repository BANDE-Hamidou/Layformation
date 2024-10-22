<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuizRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Autoriser la requête
    }

    public function rules()
    {
        return [
            'chapitre_id' => 'required|exists:chapitres,id',
            'question' => 'required|string',
            'options' => 'required|array',
            'correct_option' => 'required|string',
        ];
    }
}
