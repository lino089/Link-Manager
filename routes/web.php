<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;
use App\Models\Link;

Route::get('/', [LinkController::class, 'publicPage'])->name('public');

Route::resource('links', LinkController::class);

Route::get('/go/{link}', [LinkController::class, 'visit'])->name('links.visit');