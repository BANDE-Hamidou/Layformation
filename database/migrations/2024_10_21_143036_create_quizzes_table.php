<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->unsignedBigInteger('chapitre_id'); // Lien vers la table chapitres
            $table->string('titre'); // Titre du quiz
=======
            $table->string('titre');
            $table->unsignedBigInteger('chapitre_id');
            $table->json('questions'); // Stockera toutes les questions et leurs options
>>>>>>> origin/main
            $table->timestamps();

            $table->foreign('chapitre_id')
                  ->references('id')
                  ->on('chapitres')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
}
