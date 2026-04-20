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
                return $group === 'mpk-bph' ||
                       collect(['ketua', 'wakil', 'sekrehara', 'humas', 'perangkat aspirasi'])->contains(fn($r) => str_contains($role, $r));
            case 'prestasi':
                return collect(['ketua', 'waketua', 'akademis', 'humas osis', 'komisi c'])->contains(fn($r) => str_contains($role, $r));
            case 'thamnet':
                return collect(['ketua', 'waketua', 'akademis', 'komisi c'])->contains(fn($r) => str_contains($role, $r));
            default:
                return false;
        }
    }
}
