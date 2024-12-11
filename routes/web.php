<?php

use Illuminate\Support\Facades\Route;

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



// SASTRA BUDAYA
Route::get('/program-kerja/sastra-budaya', function() {
    return view('program-kerja.sasbud');
});
Route::get('/program-kerja/sastra-budaya/thamrin-sastra-fair', function() {
    return view('program-kerja.sasbud.tsf');
});



// ROHANI
Route::get('/program-kerja/rohani', function() {
    return view('program-kerja.rohani');
});
Route::get('/program-kerja/rohani/perayaan-maulid-nabi', function() {
    return view('program-kerja.rohani.maulid-nabi');
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

Route::get('/publikasi-prestasi', function() {
    return view('pubpres');
});
