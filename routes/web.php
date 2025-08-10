<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Services\GoogleSheetService;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});
Route::get('/program-kerja', function() {
    return view('program-kerja');
});
Route::get('/program-kerja/recent', function() {
    return view('recent');
});



// AKADEMIS
Route::get('/program-kerja/akademis', function() {
    return view('program-kerja.akademis');
});
Route::get('/program-kerja/akademis/mamacu-kakacu', function() {
    return view('program-kerja.akademis.mamacu');
});
Route::get('/program-kerja/akademis/thamrin-homecoming', function() {
    return view('program-kerja.akademis.thc');
});
Route::get('/program-kerja/akademis/open-house', function() {
    return view('program-kerja.akademis.openhouse');
});

// AKADEMIS - PUBLIKASI PRESTASI
Route::get('/publikasi-prestasi', function() {
    return view('program-kerja.akademis.pubpres');
});
Route::get('/publikasi-prestasi/19-agustus-2024', function() {
    return view('program-kerja.akademis.pubpres.19082024');
});
Route::get('/publikasi-prestasi/2-september-2024', function() {
    return view('program-kerja.akademis.pubpres.02092024');
});
Route::get('/publikasi-prestasi/14-oktober-2024', function() {
    return view('program-kerja.akademis.pubpres.14102024');
});
Route::get('/publikasi-prestasi/3-februari-2025', function() {
    return view('program-kerja.akademis.pubpres.03022025');
});



// DHL
Route::get('/program-kerja/dhl/a-day-of-environment-and-human-rights', function() {
    return view('program-kerja.dhl.donuts');
});
Route::get('/program-kerja/dhl/student-council-conference', function() {
    return view('program-kerja.dhl.scorence');
});



// K3OR
Route::get('/program-kerja/k3or', function() {
    return view('program-kerja.k3or');
});
Route::get('/program-kerja/k3or/thamrin-family-gathering', function() {
    return view('program-kerja.k3or.thamfam');
});
Route::get('/program-kerja/k3or/perayaan-hari-guru', function() {
    return view('program-kerja.k3or.hari-guru');
});
Route::get('/program-kerja/k3or/thamrin-sport-and-creativity-week', function() {
    return view('program-kerja.k3or.tsc');
});



// SASTRA BUDAYA
Route::get('/program-kerja/sastra-budaya', function() {
    return view('program-kerja.sasbud');
});
Route::get('/program-kerja/sastra-budaya/thamrin-sastra-fair', function() {
    return view('program-kerja.sasbud.tsf');
});
Route::get('/program-kerja/sastra-budaya/young-eagle-showcase', function() {
    return view('program-kerja.sasbud.yes');
});
Route::get('/program-kerja/sastra-budaya/thamrin-got-talent', function() {
    return view('program-kerja.sasbud.tgt');
});



// ROHANI
Route::get('/program-kerja/rohani', function() {
    return view('program-kerja.rohani');
});
Route::get('/program-kerja/rohani/perayaan-maulid-nabi', function() {
    return view('program-kerja.rohani.maulid-nabi');
});
Route::get('/program-kerja/rohani/perayaan-isra-miraj', function() {
    return view('program-kerja.rohani.isra-miraj');
});




// KABINET
Route::get('/kabinet/osis', function() {
    return view('kabinet.osis');
});
Route::get('/kabinet/mpk', function() {
    return view('kabinet.mpk');
});



// OTHERS
Route::get('/merchandise', function() {
    return view('merchandise');
});
Route::get('/thamrin-wall-of-aspiration', function() {
    return view('thalation');
});

// THAMNET
Route::get('/thamnet', function() {
    return view('thamnet.home');
});

Route::get('/thamnet/blog/hall-of-fame', function() {
    return view('thamnet.blog.halloffame');
});

Route::get('/thamnet/blog/openhouse2025', function() {
    return view('thamnet.blog.openhouse2025');
});

// THANOS

Route::get('/thanos', function () {
    $targetDate = Carbon::create(2025, 8, 10, 12, 00, 0, 'Asia/Bangkok'); // GMT+7 timezone
    $endDate = $targetDate->copy()->addDays(1)->addHours(2)->addMinutes(0);
    $currentDate = Carbon::now('Asia/Bangkok');

    return view($currentDate->between($targetDate, $endDate) ? 'thanos' : 'thanos_wait');
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

    $googleSheetService = app(GoogleSheetService::class);
    $formController = new FormController($googleSheetService);
    return $formController->submitForm($request);
});

Route::get('/sitemap.xml', function () {
    return response()->file(resource_path('views/sitemap.xml'), [
        'Content-Type' => 'application/xml'
    ]);
});
