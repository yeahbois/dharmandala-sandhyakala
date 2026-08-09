<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = [
        'title',
        'date',
        'content',
        'pictures_urls',
        'important'
    ];

    protected $casts = [
        'date' => 'date',
        'pictures_urls' => 'array',
        'important' => 'boolean'
    ];
}
