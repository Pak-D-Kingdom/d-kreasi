<?php

use Illuminate\Support\Facades\Route;

// D-KREASI — Homepage utama
Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::view('/webia', 'website-bisnis.index')
    ->name('webia.index');

Route::view('/webia/koleksi', 'website-bisnis.collections.index')
    ->name('webia.collections');
