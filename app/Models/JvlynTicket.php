<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JvlynTicket extends Model
{
    protected $table = 'jvlyn_tickets';

    protected $fillable = [
        'order_id',
        'ticket_type',
        'ticket_status',
        'is_scanned',
        'referral_code',
        'ticket_id',
        'seat_number',
    ];

    protected $casts = [
        'is_scanned' => 'boolean',
    ];

    /**
     * Get the order that owns the ticket.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
