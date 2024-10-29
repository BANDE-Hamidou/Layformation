<?php

// app/Http/Requests/VerifyQuizAnswerRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyQuizAnswerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'answer' => 'required|string'
        ];
    }
}
