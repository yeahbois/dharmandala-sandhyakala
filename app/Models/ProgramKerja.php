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
        'divisi_id',
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

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
