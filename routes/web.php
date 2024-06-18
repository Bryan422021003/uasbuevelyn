<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClothesController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/clothes', function () {
    return view('pages.plp');
})->name('plp');

Route::get('/clothes/{i}', function () {
    return view('pages.pdp');
})->name('pdp');

