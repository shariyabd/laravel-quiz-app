<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_answer_papers', function (Blueprint $table) {
            $table->id();
            $table->integer('quiz_question_paper_id');
            $table->integer('quiz_id');
            $table->string('user_answer'); // Stores the selected option (e.g., option_1)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_answer_papers');
    }
};
