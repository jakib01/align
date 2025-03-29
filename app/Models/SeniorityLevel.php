<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeniorityLevel extends Model
{
    use HasFactory;

    // Define the table if necessary (optional if the table name follows Laravel's convention)
    protected $table = 'seniority_levels';

    // If you're not using all fields, specify the fillable fields
    protected $fillable = ['seniority_level'];
}


