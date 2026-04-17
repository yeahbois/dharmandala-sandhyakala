<?php

namespace Database\Seeders;

use App\Models\Multimedia;
use App\Models\Post;
use App\Models\Prestasi;
use App\Models\ProgramKerja;
use App\Models\Thalation;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Thalation::create([
            'jumlah_pengunjung' => 100,
            'next_macapi' => '2026-07-22 20:00:00',
        ]);

        ProgramKerja::create([
            'name' => 'Thamrin Summit',
            'title' => 'Thamrin Summit 4.0',
            'date' => '2025-10-20',
            'content' => 'Inter-school competition focused on digital diplomacy.',
            'pictures_urls' => ['https://lh3.googleusercontent.com/aida-public/AB6AXuCWJ2UiE2dvcBE77JDYlDyacz6rdS07NHuMEnIsB-VY1K1G3WVD-X2xSkfMxw3SUzwzy4gzQRAJZ3HjRyKkRWIARQ6Ob3BLRGlgxJsiEaAR6QDdgYWFFY3s5S7Ca0Ca6gi3adRGgsC-sYnsiYLy1lbJXUCo-UUnxVrdWs10vAtYpD_gcHExUrpm9Ub5eR85CfVkTa-cxj0ieXkR7cpplpdjHgFhoLY29DmjBkytkLGWiCVRcU--HD8VO9mDSbQWbTZ9vcx2ZGqojFo'],
            'division' => 'Academic',
            'featured' => true,
            'homepage' => true,
        ]);

        Multimedia::create([
            'url' => 'https://www.youtube.com/watch?v=qGhGDXOk0pY',
            'homepage' => true,
        ]);

        Post::create([
            'title' => 'Digital Diplomacy 101',
            'slug' => 'digital-diplomacy-101',
            'content' => 'Bridge the gap between tradition and digital speed within the cabinet\'s internal workflow.',
            'author' => 'Admin',
            'category' => 'Program Kerja',
            'is_featured' => true,
            'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB9RUJekgSiw5S6tCXqlHvZ3HI8gFb-4-i611Y0_4CTEtGrSAiXPifuv8Djmu5Wu9hroeGqfBjrXiv1udllfPAE4H_wXUD4yRPYbe0cwIMBiWW-NjJb1CZqM3Ewr4YmipUtG6rCWTRXgfUQY9mmsCs05o_OPh5YoZTMrx7E1eSHTo2eW7_6IQnmtTL3EtWZ2mn3d0hL30Uf5tqH6nzFhHuXx4OfwaeycHHZS7AygtJbmEu5v2TGs_B2S3j17i2D9XMeSRiaOOBUdVI'
        ]);

        Prestasi::create([
            'title' => '1st Place National Robotics',
            'date' => '2025-09-01',
            'content' => 'Gold medal in Surabaya sets new record for autonomous fleet navigation.',
            'pictures_urls' => ['https://lh3.googleusercontent.com/aida-public/AB6AXuDLWG-f1T_yXJ1d3WzYjnOzL7BMCsQQ7Jp3mzu23IsiqJtZMLyQd2e0MoE88W1-Cx-FA3MOa70C467Oce4qdkdnO1iyQZ5g_5OTHJuE4kDPe2pGiNOzXzGPi2N4KtZPibEp4Iz9FtIU-WMo-MbZGxmoa0MC2OL57lAzTRlC5zQWFEPHxFCk0rc34N5ftqJJqhZd0DabphN9IM2aJZY8ukI6cYgWO-qUB1p3Ad0dkSqf-SBqOz1NOiQ6siCFZ2qHfeTob1BfAlBAAd0'],
            'important' => true,
        ]);

        ProgramKerja::create([
            'name' => 'Pudo Project',
            'title' => 'Pudo Documentary',
            'date' => '2025-11-01',
            'content' => 'Documenting the journey of our cabinet.',
            'division' => 'pudo',
            'featured' => true,
        ]);
    }
}
