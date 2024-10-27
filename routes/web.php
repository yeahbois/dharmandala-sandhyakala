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

Route::get('/program-kerja/akademis', function() {
    return view('program-kerja.akademis');
});

Route::get('/program-kerja/k3or', function() {
    return view('program-kerja.k3or');
});

Route::get('/program-kerja/akademis/mamacu-kakacu', function() {
    return view('program-kerja.akademis.mamacu-kakacu');
});

Route::get('/program-kerja/k3or/thamrin-family-gathering', function() {
    return view('program-kerja.k3or.thamfam');
});

Route::get('/program-kerja/sastra-budaya/thamrin-sastra-fair', function() {
    return view('program-kerja.sasbud.tsf');
});

Route::get('/merchandise', function() {
    return view('merchandise');
});

Route::get('/kabinet/osis', function() {
    return view('kabinet.osis');
});

Route::get('/kabinet/mpk', function() {
    return view('kabinet.mpk');
});

Route::get('/thalation', function() {
    return view('thalation');
});

Route::get('/publikasi-prestasi', function() {
    return view('pubpres');
});
