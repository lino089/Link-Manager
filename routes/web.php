<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('publicPage');
});

Route::resource('links', LinkController::class);

Route::get('/go/{link}', [LinkController::class, 'visit'])->name('links.visit');