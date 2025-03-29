<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['candidate_id', 'question_id', 'option_id', 'score'];

    // Relationship with Candidate
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    // Relationship with AssessmentQuestion
    public function question()
    {
        return $this->belongsTo(AssessmentQuestion::class, 'question_id');
    }

    // Relationship with AssessmentOption
    public function option()
    {
        return $this->belongsTo(AssessmentOption::class, 'option_id');
    }
}
