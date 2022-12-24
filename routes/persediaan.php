<?php

use Illuminate\Support\Facades\Route;

Route::get('stock', [\App\Http\Controllers\Stock\StockController::class, 'index'])->name('stock');
Route::get('persediaan', [\App\Http\Controllers\Persediaan\PersediaanController::class, 'index'])->name('persediaan');

Route::get('persediaan/awal', [\App\Http\Controllers\Persediaan\PersediaanAwalController::class, 'index'])->name('persediaan.awal');
Route::get('persediaan/awal/form', \App\Http\Livewire\Persediaan\PersediaanAwalForm::class)->name('persediaan.awal.form');
Route::get('persediaan/awal/form/{persediaan_awal_id}', \App\Http\Livewire\Persediaan\PersediaanAwalForm::class)->name('persediaan.awal.form.edit');
