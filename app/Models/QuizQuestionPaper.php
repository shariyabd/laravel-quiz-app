<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class QuizQuestionPaper extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $fillable = ['title','subtitle','duration', 'full_marks', 'quiz_id'];

    public function quizes(){
        return $this->belongsTo(QuizQuestionPaper::class,'quiz_id');
    }

    // protected $casts = [
    //     'quiz_id' => 'json',
    //  ];
}


