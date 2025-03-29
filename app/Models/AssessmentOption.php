<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentOption extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'assessment_options';

    // Define the fillable fields
    protected $fillable = [
        'assessment_question_id',  // Foreign key to assessment_questions table
        'option_text',                    // Option text
        'score',                   // Option score
    ];

    // Define the relationship with AssessmentQuestion
    public function question()
    {
        return $this->belongsTo(AssessmentQuestion::class, 'question_id', 'id');
    }

}

