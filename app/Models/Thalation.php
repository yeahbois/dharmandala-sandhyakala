<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thalation extends Model
{
    use HasFactory;

    protected $fillable = [
        'jumlah_pengunjung',
        'next_macapi',
    ];
}
