<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChapitreRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Autoriser la requête
    }

    public function rules()
    {
        return [
            'module_id' => 'required|exists:modules,id',
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'chemin_video' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:100240',
        ];
    }
}
