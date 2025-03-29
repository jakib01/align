<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'employer_id',   // Ensure employer_id is fillable
        'company_name',
        'title',
        'description',
        'requirements',
        'benefits',
        'salary_range',
        'seniority_level',
        'job_location',
        'working_pattern',
        'industry',
        'visa_sponsorship',
        'application_deadline',
    ];

    // In Job model
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}

