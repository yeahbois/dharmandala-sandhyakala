<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Services\GoogleSheetService;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\PudoBoothAdmin;
use App\Http\Controllers\OpenHouseController;

// Home
Route::get('/', function () {
    return view('sementara.homepage', [
        "alert" => session('success'),
        "alertForward" => "/"
    ]);
});
Route::get('/maintenance', function () {
    return view('sementara.maintenance');
});
Route::get('/openhouse26', function () {
    return view('sementara.openhouse');
});

// Nav
Route::get('/publikasiprestasi', function () {
    return view('sementara.maintenance');
});
Route::get('/thalation', function () {
    return view('sementara.maintenance');
});
Route::get('/programkerja', function () {
    return view('sementara.maintenance');
});
Route::get('/merchandise', function () {
    return view('sementara.maintenance');
});
Route::get('/kabinet/osis', function () {
    return view('sementara.maintenance');
});
Route::get('/kabinet/mpk', function () {
    return view('sementara.maintenance');
});

// Thanos
Route::get('/thanos', function () {
    $targetDate = Carbon::create(2025, 10, 29, 19, 00, 0, 'Asia/Bangkok'); // GMT+7 timezone
    $endDate = $targetDate->copy()->addDays(1)->addHours(1)->addMinutes(0);
    $currentDate = Carbon::now('Asia/Bangkok');

    return view('thanos');
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

// OPEN HOUSE FRONTEND
Route::get('/oh/ticket', function() {
    return view('sementara.openhouse_check_ticket');
});
Route::get('/oh/ticket/data', [OpenHouseController::class, 'showTicketDataPage'])->name('oh.ticketdata');
Route::get('/oh/dashboard', function() {
    return view('sementara.openhouse_dashboard');
});
Route::get('oh/database', function() {
    return redirect()->away('https://auth-db1322.hstgr.io/');
});
// OPEN HOUSE API
// DEBUG
Route::get('/api/oh/data', [OpenHouseController::class, 'getOpenHouseData'])->name('oh.data');
Route::get('/api/oh/stats', [OpenHouseController::class, 'getOpenHouseStats'])->name('oh.stats');
Route::get('/api/oh/parsed-data', [OpenHouseController::class, 'getParsedData'])->name('oh.parseddata');
Route::get('/api/oh/sync-sql', [OpenHouseController::class, 'syncToSQLDatabase'])->name('oh.syncsql');
Route::get('/api/oh/check-new-data', [OpenHouseController::class, 'checkSheetsBaru'])->name('oh.checknewdata');
Route::get('/api/oh/sql-search', [OpenHouseController::class, 'sqlSearchLogic'])->name('oh.sqlsearchdata');
// API SHEETS
Route::get('/api/oh/check-ticket-sheets/{name}', [OpenHouseController::class, 'sheetsCheckTicket'])->name('oh.checkticket');
// API SQL
Route::get('/api/oh/get-all-data-sql', [OpenHouseController::class, 'sqlGetAllData'])->name('oh.getallsqldata');
Route::get('/api/oh/check-ticket-sql', [OpenHouseController::class, 'sqlCheckTicket'])->name('oh.checkticketsql');
Route::get('/api/oh/update-ticket-status', [OpenHouseController::class, 'sqlUpdateTicketStatus'])->name('oh.updateticketstatus');
// API ABSENSI
Route::get('/api/oh/present', [OpenHouseController::class, 'sqlOHPresent'])->name('oh.sqlOHPresent');


// Shortener Akademis
Route::get('/prestasimht', function() {
    return redirect()->away('https://forms.gle/VzviKQwzCPWuvREK8');
});
Route::get('/lombamht', function() {
    return redirect()->away('https://forms.gle/WPmgaKRVJn6JiWmG6');
});

// ThamNet
Route::get('/thamnet', function () {
    return view('sementara.maintenance');
});
Route::get('/thamnet/blog/{name}', function () {
    return view('sementara.maintenance');
});
Route::get('/thamnet/blog/new', function () {
    return view('sementara.maintenance');
});


// // PudoBooth
// Route::get('/pudobooth', function () {
//     return view('pudobooth.camera');
// });
// Route::get('/pudobooth/queue', function () {
//     return "Queue closed.";
// });
// Route::get('/admin/pudobooth', function () {
//     return view('pudobooth.admin');
// });
// Route::get('/admin/pudobooth/settings', function () {
//     return view('pudobooth.adminSetting');
// });
// // PudoBooth Queue API
// Route::get('/queue', [QueueController::class, 'getAllData'])->name('queue.data');
// Route::post('/queue/add', [QueueController::class, 'appendData'])->name('queue.create');
// Route::delete('/queue/remove/{name}', [QueueController::class, 'removeData']);
// Route::get('/queue/search/{name}', [QueueController::class, 'searchByName']);
// Route::post('/queue/move-up/{name}', [QueueController::class, 'moveUp']);
// Route::post('/queue/move-down/{name}', [QueueController::class, 'moveDown']);
// Route::post('/queue/move-top/{name}', [QueueController::class, 'moveToTop']);
// Route::post('/queue/move-bottom/{name}', [QueueController::class, 'moveToBottom']);
// Route::post('/queue/complete', [QueueController::class, 'complete']);
// // PudoBooth Admin API
// Route::get('/api/admin/setting/get/url/{data}', [PudoBoothAdmin::class, "getURL"]);
// Route::post('/api/admin/setting/pudobooth/driveURL/{url}', [PudoBoothAdmin::class, 'changeDriveURL']);
// Route::post('/api/admin/setting/pudobooth/spreadsheetURL/{url}', [PudoBoothAdmin::class, 'changeSpreadsheetURL']);
// Route::post('/api/admin/setting/pudobooth/frameURL/{url}', [PudoBoothAdmin::class, 'changeFrameURL']);
// Route::get('/api/admin/setting/pudobooth/preset/{id}', [PudoBoothAdmin::class, 'getPreset']);
// Route::post('/api/admin/setting/pudobooth/preset/{id}', [PudoBoothAdmin::class, 'changePresetSetting']);
// // Google OAuth 2.0 for PhotoBooth Google Drive
// Route::get('/google/auth', [GoogleController::class, 'redirectToGoogle']);
// Route::get('/google/callback', [GoogleController::class, 'handleCallback']);
// // Upload endpoint (used by photobooth)
// Route::post('/pudobooth/upload', [GoogleController::class, 'uploadPhoto']);


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

// ThamNet
Route::get('/thamnet/blog/hall-of-fame', function() {
    return view('thamnet.blog.halloffame');
});

Route::get('/thamnet/blog/openhouse2025', function() {
    return view('thamnet.blog.openhouse2025');
});

Route::get('/sitemap.xml', function () {
    return response()->file(resource_path('views/sitemap.xml'), [
        'Content-Type' => 'application/xml'
    ]);
});
