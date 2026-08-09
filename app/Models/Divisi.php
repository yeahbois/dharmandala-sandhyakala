<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'about',
        'details',
        'group',
        'type',
    ];

    public function programKerjas()
    {
        return $this->hasMany(ProgramKerja::class);
    }
}
