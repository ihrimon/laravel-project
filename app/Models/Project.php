<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'subtitle',
        'stack',
        'highlights',
        'link',
        'year',
        'category',
    ];

    protected $casts = [
        'stack' => 'array',
        'highlights' => 'array',
    ];
}
