<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailboxCounter extends Model
{
    protected $table = 'mailbox_counters';

    protected $primaryKey = 'mailbox_email';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'mailbox_email',
        'current_usage',
        'last_reset',
    ];

    protected $casts = [
        'current_usage' => 'integer',
        'last_reset'    => 'date',
    ];
}
