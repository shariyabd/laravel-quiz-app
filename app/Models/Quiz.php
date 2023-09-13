<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'title',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'correct_answer',
        'quiz_topic_id'
    ];

    public function quizTopic(){
        return $this->belongsTo(QuizTopic::class);
    }
    
}
