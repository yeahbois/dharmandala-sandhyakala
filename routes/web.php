<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Services\GoogleSheetService;
use App\Http\Controllers\ThamNetController;
use App\Http\Controllers\Api\ContentController;
use App\Models\Thalation;
use App\Models\ProgramKerja;
use App\Models\Multimedia;
use App\Models\Post;
use App\Models\Prestasi;
use App\Models\Admin;

// Remember:
// Route -> Controllers -> Services -> Models
// ThamNet Blog Types: Program Kerja, Prestasi, Cerita, Ilmu
// System: Login, Blogs

/*

PROKER -> AMBIL DATA DARI DATABASE
INFORMASI SEKSI -> AMBIL DATA PROKER DARI DATABASE
PRESTASI -> AMBIL DATA DARI DATABASE

*/


// Home
Route::get('/', function () {
    $featuredProkers = ProgramKerja::where('homepage', true)->get();
    $multimedias = Multimedia::where('homepage', true)->get();
    $featuredPost = Post::where('is_featured', true)->latest()->first();
    $prestasis = Prestasi::latest()->take(10)->get();

    return view('dharman_homepage.homepage', [
        "alert" => session('success'),
        "alertForward" => "/",
        "featuredProkers" => $featuredProkers,
        "multimedias" => $multimedias,
        "featuredPost" => $featuredPost,
        "prestasis" => $prestasis
    ]);
});

Route::get('/maintenance', function () {
    return view('dharman_homepage.maintenance');
});
Route::get('/coming_soon', function () {
    return view('dharman_homepage.coming_soon');
});

// Nav
Route::get('/publikasiprestasi', function () {
    $prestasis = \App\Models\Prestasi::latest()->get();
    return view('dharman_homepage.publikasiprestasi', compact('prestasis'));
});
Route::get('/publikasiprestasi/{id}', function ($id) {
    $prestasi = \App\Models\Prestasi::findOrFail($id);
    return view('dharman_homepage.prestasi_detail', compact('prestasi'));
});
Route::get('/thalation', function () {
    $thalation = Thalation::first();
    if (!$thalation) {
        $thalation = Thalation::create([
            'jumlah_pengunjung' => 0,
            'next_macapi' => '2027-07-22 20:00:00' // change to today
        ]);
    }
    $thalation->increment('jumlah_pengunjung');

    return view('dharman_homepage.thalation', compact('thalation'));
});
Route::get('/programkerja', function () {
    $total_prokers = \App\Models\ProgramKerja::count();
    $osis_divisis = \App\Models\Divisi::where('type', 'osis')->with('programKerjas')->get();
    $mpk_divisis = \App\Models\Divisi::where('type', 'mpk')->with('programKerjas')->get();
    return view('dharman_homepage.proker', compact('total_prokers', 'osis_divisis', 'mpk_divisis'));
});
Route::get('/programkerja/{id}', function ($id) {
    $proker = \App\Models\ProgramKerja::findOrFail($id);
    return view('dharman_homepage.proker_detail', compact('proker'));
});
Route::get('/merchandise', function () {
    return redirect('/coming_soon');
});

// KABINET
$cabinetData = json_decode(file_get_contents(base_path('database/data/cabinet.json')), true);
$cabinetSections = [
    'osis' => [],
    'mpk' => []
];
foreach (['osis', 'mpk'] as $inst) {
    foreach ($cabinetData[$inst]['structure'] as $item) {
        if ($item['type'] === 'bidang') {
            $cabinetSections[$inst][$item['slug']] = $item;
        } elseif ($item['type'] === 'container') {
            foreach ($item['sections'] as $seksi) {
                $cabinetSections[$inst][$seksi['slug']] = $seksi;
            }
        }
    }
}

// Helper to sync JSON data with Database
$syncCabinetWithDb = function(&$data) {
    try {
        $admins = Admin::all()->keyBy('name');
        
        $processMembers = function(&$members) use ($admins) {
            foreach ($members as &$member) {
                if (isset($admins[$member['name']])) {
                    $admin = $admins[$member['name']];
                    $member['ig'] = $admin->instagram ?? $member['ig'];
                    $member['quote'] = $admin->quotes ?? $member['quote'];
                }
            }
        };

        if (isset($data['structure'])) {
            foreach ($data['structure'] as &$item) {
                if ($item['type'] === 'bidang') {
                    $processMembers($item['members']);
                } elseif ($item['type'] === 'container') {
                    foreach ($item['sections'] as &$seksi) {
                        $processMembers($seksi['members']);
                    }
                }
            }
        } else {
            // It's a single seksi/bidang data
            if (isset($data['members'])) {
                $processMembers($data['members']);
            }
        }
    } catch (\Exception $e) {
        // Fallback to JSON if DB fails
    }
};

Route::get('/kabinet/osis', function () use ($cabinetData, $syncCabinetWithDb) {
    $syncCabinetWithDb($cabinetData['osis']);
    return view('dharman_kabinet.osis', ['data' => $cabinetData['osis']]);
});

Route::get('/kabinet/osis/ds/seksi/{seksi}', function ($seksi) use ($cabinetData, $cabinetSections, $syncCabinetWithDb) {
    if (!isset($cabinetSections['osis'][$seksi])) abort(404);

    $data = $cabinetSections['osis'][$seksi];
    $syncCabinetWithDb($data);

    $divisi = \App\Models\Divisi::where('slug', $seksi)->first();
    $featured_proker = $divisi ? $divisi->programKerjas()->where('featured', true)->get() : collect();
    $all_proker = $divisi ? $divisi->programKerjas()->get() : collect();

    return view('dharman_kabinet.informasi_seksi', [
        "type" => "osis",
        "slug" => $seksi,
        "data" => $data,
        "divisi" => $divisi,
        "theme" => $cabinetData['osis']['theme'],
        "featured_proker" => $featured_proker,
        "all_proker" => $all_proker
    ]);
});

Route::get('/kabinet/mpk', function () use ($cabinetData, $syncCabinetWithDb) {
    $syncCabinetWithDb($cabinetData['mpk']);
    return view('dharman_kabinet.mpk', ['data' => $cabinetData['mpk']]);
});

Route::get('/kabinet/mpk/ds/bidang/{bidang}', function ($bidang) use ($cabinetData, $cabinetSections, $syncCabinetWithDb) {
    if (!isset($cabinetSections['mpk'][$bidang])) abort(404);

    $data = $cabinetSections['mpk'][$bidang];
    $syncCabinetWithDb($data);

    $divisi = \App\Models\Divisi::where('slug', $bidang)->first();
    $featured_proker = $divisi ? $divisi->programKerjas()->where('featured', true)->get() : collect();
    $all_proker = $divisi ? $divisi->programKerjas()->get() : collect();

    return view('dharman_kabinet.informasi_seksi', [
        "type" => "mpk",
        "slug" => $bidang,
        "data" => $data,
        "divisi" => $divisi,
        "theme" => $cabinetData['mpk']['theme'],
        "featured_proker" => $featured_proker,
        "all_proker" => $all_proker
    ]);
});

// ThamNet
Route::get('/thamnet', [ThamNetController::class, 'index'])->name('thamnet.home');
Route::get('/thamnet/blog/editor/{slug?}', [ThamNetController::class, 'editor'])->middleware('auth')->name('thamnet.editor');
Route::get('/thamnet/blog/{slug}', [ThamNetController::class, 'show'])->name('thamnet.show');
Route::get('/login', [ThamNetController::class, 'login'])->name('login');

// ThamNet API
Route::get('/debug/get/all_blogs', [ThamNetController::class, 'debug_all_data'])->name('thamnet.debug.alldata');
Route::post('/thamnet/api/blog/store', [ThamNetController::class, 'store'])->middleware('auth')->name('thamnet.store');
Route::post('/thamnet/api/login', [ThamNetController::class, 'authenticate']);
Route::get('/thamnet/api/logout', [ThamNetController::class, 'logout'])->name('logout');

// Thanos
use App\Http\Controllers\ThanosController;
Route::get('/thanos', [ThanosController::class, 'publicIndex'])->name('thanos.index');
Route::post('/submit-form', [ThanosController::class, 'submitResponse'])->name('thanos.submit');
Route::middleware('auth')->group(function () {
    Route::get('/admin/makethanos', [ThanosController::class, 'create'])->name('thanos.create');
    Route::post('/thanosevent', [ThanosController::class, 'store'])->name('thanos.store');
    Route::delete('/admin/thanos/delete', [ThanosController::class, 'delete'])->name('thanos.delete');
});

// Dashboard
use App\Http\Controllers\DashboardController;
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/admin/update', [DashboardController::class, 'updateAdmin'])->name('dashboard.admin.update');
    Route::post('/dashboard/divisi/{divisi}/update', [DashboardController::class, 'updateDivisi'])->name('dashboard.divisi.update');
    Route::post('/dashboard/programkerja', [DashboardController::class, 'storeProgramKerja'])->name('dashboard.programkerja.store');
    Route::delete('/dashboard/programkerja/{programKerja}', [DashboardController::class, 'deleteProgramKerja'])->name('dashboard.programkerja.delete');
    Route::post('/dashboard/multimedia', [DashboardController::class, 'storeMultimedia'])->name('dashboard.multimedia.store');
    Route::delete('/dashboard/multimedia/{multimedia}', [DashboardController::class, 'deleteMultimedia'])->name('dashboard.multimedia.delete');
    Route::post('/dashboard/thalation/update', [DashboardController::class, 'updateThalation'])->name('dashboard.thalation.update');
    Route::post('/dashboard/prestasi', [DashboardController::class, 'storePrestasi'])->name('dashboard.prestasi.store');
    Route::delete('/dashboard/prestasi/{prestasi}', [DashboardController::class, 'deletePrestasi'])->name('dashboard.prestasi.delete');
    Route::delete('/dashboard/post/{post}', [DashboardController::class, 'deletePost'])->name('dashboard.post.delete');
});

// Content API
Route::prefix('api')->group(function () {
    Route::post('/prestasi', [ContentController::class, 'addPrestasi']);
    Route::delete('/prestasi/{id}', [ContentController::class, 'removePrestasi']);
    Route::post('/programkerja', [ContentController::class, 'addProgramKerja']);
    Route::delete('/programkerja/{id}', [ContentController::class, 'removeProgramKerja']);
});

// Shortener Akademis
Route::get('/prestasimht', function () {
    return redirect()->away('https://forms.gle/VzviKQwzCPWuvREK8');
});
Route::get('/lombamht', function () {
    return redirect()->away('https://forms.gle/WPmgaKRVJn6JiWmG6');
});

Route::get('/sitemap.xml', function () {
    return response()->file(resource_path('views/sitemap.xml'), [
        'Content-Type' => 'application/xml'
    ]);
});
