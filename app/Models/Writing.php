<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Writing extends Model
{
    protected $fillable = [
        'title',
        'summary',
        'topic',
        'link',
    ];
}
