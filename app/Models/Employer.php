<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'company_name',
        'description',
        'logo',
        'contact_phone',
        'contact_address',
        'social_links',
        'about_us',
        'industry',
        'founded',
        'employees_count',
        'website',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'social_links' => 'array', // Cast JSON social links to an array
    ];
    public function teamMembers()
    {
        return $this->hasMany(TeamMember::class);
    }

}
