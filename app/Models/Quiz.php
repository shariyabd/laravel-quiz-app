<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = 
    [
        'title',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'correct_answer',
        'image',
        'quiz_topic_id'
    ];

    public function quizTopic(){
        return $this->belongsTo(QuizTopic::class, 'quiz_topic_id');
    }

    public function quizQuestion(){
        return $this->hasOne(QuizQuestionPaper::class);
    }
    
    
}
