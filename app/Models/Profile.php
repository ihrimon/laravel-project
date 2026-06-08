<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'title',
        'tagline',
        'summary',
        'location',
        'email',
        'phone',
        'website',
        'social', 
        'years_of_experience',
        'availability',
    ];

    protected $casts = [
        'social' => 'array',
    ];
}
