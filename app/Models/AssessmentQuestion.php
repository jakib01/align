<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentQuestion extends Model
{
    use HasFactory;

    protected $table = 'assessment_questions'; // Explicitly specify the table name

    protected $fillable = [
        'question_text',
        'assessment_type',
    ];

    public function options()
    {
        return $this->hasMany(AssessmentOption::class, 'question_id', 'id');

    }

}

