<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'titre',
        'chapitre_id',
        'questions'
    ];

    protected $casts = [
        'questions' => 'array'
    ];

    public function chapitre()
    {
        return $this->belongsTo(Chapitre::class);
    }
}
