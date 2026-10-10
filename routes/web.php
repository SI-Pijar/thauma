<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('artikel.index');
});

Route::get('/kategori', [CategoryController::class, 'index'])->name('kategori.index');

Route::get('/artikel', [PostController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{id}', [PostController::class, 'show'])->whereNumber('id')->name('artikel.show');

Route::get('/galeri', [SubmissionController::class, 'index'])->name('galeri.index');
Route::get('/galeri/{id}', [SubmissionController::class, 'show'])->whereNumber('id')->name('galeri.show');

Route::get('/laporan', [ReportController::class, 'index'])->name('laporan.index');