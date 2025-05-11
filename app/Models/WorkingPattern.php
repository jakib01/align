<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingPattern extends Model
{
    use HasFactory;

    protected $table = 'working_patterns'; // Explicitly specify the table name
    protected $fillable = ['working_pattern'];
}


