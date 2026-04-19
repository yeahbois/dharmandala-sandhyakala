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
            'jumlah_pengunjung' => 0,
            'next_macapi' => '2026-07-22 20:00:00',
        ]);

        ProgramKerja::create([
            'name' => 'Thamrin Network',
            'title' => 'Thamrin Network',
            'date' => '2026-04-20',
            'content' => 'Thamrin Network (ThamNet) adalah platform intranet resmi siswa SMAN Unggulan M.H. Thamrin yang dirancang untuk menjadi pusat ekosistem digital sekolah. Di sini, kita tidak hanya mengelola administrasi, tetapi juga membangun komunitas melalui blog cerita, tutorial teknologi, sharing ilmu pengetahuan, hingga funfact menarik seputar kehidupan asrama dan sekolah. ThamNet hadir sebagai bukti nyata realisasi digitalisasi di lingkungan Dharmandala Sandhyakala.',
            'pictures_urls' => ['images/logo/osis/akad514.webp'],
            'divisi_id' => \App\Models\Divisi::where('slug', 'akad')->first()?->id,
            'featured' => true,
            'homepage' => true,
        ]);

        Multimedia::create([
            'url' => 'https://www.youtube.com/watch?v=qGhGDXOk0pY',
            'homepage' => true,
        ]);

        Post::create([
            'title' => 'Thamrin Network Sudah Dapat Diakses!',
            'slug' => 'thamnet-akses',
            'content' => 'Kabar gembira untuk seluruh warga SMANU MHT! Thamrin Network atau ThamNet kini sudah dapat diakses secara resmi melalui perangkat masing-masing. Kalian bisa langsung menuju /thamnet untuk mengeksplorasi berbagai fitur canggih yang tersedia. Mulai dari pendaftaran event, akses modul pembelajaran, hingga ruang aspirasi digital, semuanya ada dalam genggaman. Mari kita manfaatkan platform ini untuk mendukung produktivitas dan kreativitas kita selama di sekolah.',
            'author' => 'Marcello Lienarta',
            'category' => 'Program Kerja',
            'is_featured' => true,
            'image_url' => 'images/logo/osis/akad514.webp'
        ]);

        Prestasi::create([
            'title' => 'OSN',
            'date' => '2026-04-20',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'pictures_urls' => ['images/logo/osis/akad514.webp'],
            'important' => true,
        ]);
    }
}
