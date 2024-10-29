<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChapitreRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette requête.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // Autoriser la requête
    }

    /**
     * Obtient les règles de validation pour la requête.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'titre' => 'required|string|max:255', // Titre obligatoire, chaîne de caractères, max 255 caractères
            'description' => 'nullable|string', // Description facultative, chaîne de caractères
            'chemin_video' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:100240', // Vidéo facultative, formats autorisés, max 10 Mo
        ];
    }
}
