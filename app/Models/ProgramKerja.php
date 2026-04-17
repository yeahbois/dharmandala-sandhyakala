<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{
    protected $fillable = [
        'name',
        'title',
        'date',
        'content',
        'pictures_urls',
        'division',
        'type',
        'featured',
        'homepage'
    ];

    protected $casts = [
        'date' => 'date',
        'pictures_urls' => 'array',
        'featured' => 'boolean',
        'homepage' => 'boolean'
    ];
}
