<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMemberAssessment extends Model
{
    protected $fillable = ['team_member_id', 'team_member_email', 'access_token', 'is_used', 'expires_at'];

    protected $casts = [
        'expires_at' => 'datetime',
    ];}
