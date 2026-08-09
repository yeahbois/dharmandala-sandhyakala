<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThanosResponder extends Model
{
    protected $fillable = [
        'event_id',
        'name',
        'answer',
        'payment',
        'payment_number',
        'phone',
    ];

    public function event()
    {
        return $this->belongsTo(ThanosEvent::class, 'event_id', 'event_id');
    }
}
