<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Services\GoogleSheetService;
use App\Http\Controllers\ThamNetController;

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
    return view('dharman_homepage.homepage', [
        "alert" => session('success'),
        "alertForward" => "/"
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
    return view('dharman_homepage.publikasiprestasi');
});
Route::get('/thalation', function () {
    return view('dharman_homepage.thalation');
});
Route::get('/programkerja', function () {
    return view('dharman_homepage.proker');
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
Route::get('/kabinet/osis', function () use ($cabinetData) {
    return view('dharman_kabinet.osis', ['data' => $cabinetData['osis']]);
});
Route::get('/kabinet/osis/ds/seksi/{seksi}', function ($seksi) use ($cabinetData, $cabinetSections) {
    if (!isset($cabinetSections['osis'][$seksi])) abort(404);
    return view('dharman_kabinet.informasi_seksi', [
        "type" => "osis",
        "slug" => $seksi,
        "data" => $cabinetSections['osis'][$seksi],
        "theme" => $cabinetData['osis']['theme']
    ]);
});
Route::get('/kabinet/mpk', function () use ($cabinetData) {
    return view('dharman_kabinet.mpk', ['data' => $cabinetData['mpk']]);
});
Route::get('/kabinet/mpk/ds/bidang/{bidang}', function ($bidang) use ($cabinetData, $cabinetSections) {
    if (!isset($cabinetSections['mpk'][$bidang])) abort(404);

    return view('dharman_kabinet.informasi_seksi', [
        "type" => "mpk",
        "slug" => $bidang,
        "data" => $cabinetSections['mpk'][$bidang],
        "theme" => $cabinetData['mpk']['theme']
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
//Crud API
Route::get('/thamnet/api/blog/get/{id}', function () {
    // type=prestasi
    return 0;
});
Route::post('/thamnet/api/blog/update/{id}', function () {
    return 0;
});
Route::delete('/thamnet/api/blog/delete/{id}', function () {
    return 0;
});

// Thanos
Route::get('/thanos', function () {
    return view('dharman_thanos.thanos');
});
Route::post('/submit-form', function () {
    $datetime = date('Y-m-d H:i:s');
    $name = request('name');
    $answer = request('question');
    $payment = request('payment');
    $paymentNumber = request('paymentNumber');
    $phone = request('usnig');

    $request = new \Illuminate\Http\Request([
        'datetime' => $datetime,
        'name' => $name,
        'question' => $answer,
        'payment' => $payment,
        'paymentNumber' => $paymentNumber,
        'username ig' => $phone,
    ]);

    $googleSheetService = new GoogleSheetService("1oTrcemPt1Amk_8SKj4OnFD6p4PuAv7SXTurXJbrU7kM");
    $formController = new FormController($googleSheetService);
    return $formController->submitForm($request);
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
