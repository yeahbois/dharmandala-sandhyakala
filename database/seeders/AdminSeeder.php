<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = database_path('data/cabinet.json');
        $jsonData = json_decode(file_get_contents($jsonPath), true);

        $groups = [];

        foreach (['osis', 'mpk'] as $org) {
            if (!isset($jsonData[$org]['structure'])) continue;
            
            foreach ($jsonData[$org]['structure'] as $structure) {
                if ($structure['type'] === 'bidang' && isset($structure['members'])) {
                    $groups[] = [
                        'slug' => $structure['slug'],
                        'name' => $structure['name'] ?? null,
                        'about' => $structure['about'] ?? null,
                        'logo' => $structure['logo'] ?? null,
                        'group' => $structure['group'] ?? null,
                        'org_type' => $org,
                        'members' => $structure['members']
                    ];
                } elseif ($structure['type'] === 'container' && isset($structure['sections'])) {
                    foreach ($structure['sections'] as $section) {
                        if (isset($section['members'])) {
                            $groups[] = [
                                'slug' => $section['slug'],
                                'name' => $section['name'] ?? null,
                                'about' => $section['about'] ?? null,
                                'logo' => $section['logo'] ?? null,
                                'group' => $section['group'] ?? null,
                                'org_type' => $org,
                                'members' => $section['members']
                            ];
                        }
                    }
                }
            }
        }

        foreach ($groups as $group) {
            // Seed Divisi
            \App\Models\Divisi::updateOrCreate(
                ['slug' => $group['slug']],
                [
                    'name' => $group['name'] ?? $group['slug'],
                    'about' => $group['about'],
                    'details' => $group['details'] ?? null,
                    'group' => $group['group'],
                    'type' => $group['org_type']
                ]
            );

            foreach ($group['members'] as $member) {
                $name = $member['name'];
                
                // Get username: first name + second name, lowercase, no space, no special chars
                $parts = explode(' ', $name);
                $usernameRaw = strtolower($parts[0] ?? '');
                if (isset($parts[1])) {
                    $usernameRaw .= strtolower($parts[1]);
                }
                $username = preg_replace('/[^a-z0-9]/', '', $usernameRaw);
                
                // Get password: full name, lowercase, no space, no special chars
                $passwordRaw = strtolower(str_replace(' ', '', $name));
                $password = preg_replace('/[^a-z0-9]/', '', $passwordRaw);

                $type = ($name === 'Marcello Lienarta') ? 'superadmin' : 'normal';

                Admin::create([
                    'username' => $username,
                    'password' => $password,
                    'type' => $type,
                    'name' => $name,
                    'role' => $member['role'] ?? null,
                    'group' => $group['slug'] ?? null,
                    'instagram' => null,
                    'quotes' => null,
                ]);
            }
        }
    }
}
