<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;
use App\Models\Link;

Route::get('/', function () {
    $links = Link::where('is_active', true)->latest()->get();
    return view('public', compact('links'));
})->name('public');

Route::resource('links', LinkController::class);

Route::get('/go/{link}', [LinkController::class, 'visit'])->name('links.visit');