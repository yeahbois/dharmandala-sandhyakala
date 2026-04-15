<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $fillable = [
        'url',
        'app',
        'homepage',
        'thamnet'
    ];

    protected $casts = [
        'homepage' => 'boolean',
        'thamnet' => 'boolean'
    ];
}
