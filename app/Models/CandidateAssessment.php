<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateAssessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'assessment_id',
        'total_score',
        'status',
    ];

    /**
     * Get the candidate that owns the assessment.
     */
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    /**
     * Get the assessment associated with the candidate's assessment.
     */
    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
}
