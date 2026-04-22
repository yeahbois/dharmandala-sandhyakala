<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = [
        'username',
        'password',
        'type',
        'name',
        'role',
        'group',
        'instagram',
        'quotes',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function isSuperAdmin()
    {
        return $this->type === 'superadmin';
    }

    public function hasBoardAccess($board)
    {
        if ($this->isSuperAdmin()) return true;

        $role = strtolower($this->role ?? '');
        $group = strtolower($this->group ?? '');

        switch ($board) {
            case 'media':
                return str_contains($role, 'humas');
            case 'macapi':
                return $group === 'bph-mpk' ||
                       collect(['ketua mpk', 'wakil ketua mpk', 'sekrehara 1', 'sekrehara 2', 'humas 1', 'humas 2', 'perangkat aspirasi 1', 'perangkat aspirasi 2'])->contains(fn($r) => str_contains($role, $r));
            case 'prestasi':
                return $group === 'akad' ||
                       collect(['ketua akademis', 'wakil ketua akademis', 'anggota akademis'])->contains(fn($r) => str_contains($role, $r));
            case 'thamnet':
                return $group === 'akad' ||
                       collect(['ketua akademis', 'wakil ketua akademis', 'anggota akademis'])->contains(fn($r) => str_contains($role, $r));
            default:
                return false;
        }
    }
}
