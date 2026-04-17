<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $table = 'multimedias';

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
