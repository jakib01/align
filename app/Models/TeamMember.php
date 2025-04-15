<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the default plural form
    protected $table = 'team_members'; // Ensure this matches your actual table name

    // Define the mass assignable attributes
    protected $fillable = [
        'employer_id',
        'name',
        'role',
        'email',
        'admin_status',
        'status', // This field should be nullable, if you don't intend to use it immediately
        'behaviour_assessment_score',
        'value_assessment_score',
        'value_assessment_completed_at',
        'behaviour_assessment_completed_at',
        'is_send_link',
        'is_done_assessment'
    ];

    // Define the relationship with the Employer model
    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }
}
