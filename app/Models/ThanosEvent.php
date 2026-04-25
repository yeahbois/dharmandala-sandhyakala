<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThanosEvent extends Model
{
    protected $fillable = [
        'title',
        'deadline',
        'questions',
        'right_answer',
        'event_id',
    ];

    protected $casts = [
        'questions' => 'array',
        'deadline' => 'datetime',
    ];

    public function responders()
    {
        return $this->hasMany(ThanosResponder::class, 'event_id', 'event_id');
    }
}
