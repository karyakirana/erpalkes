<?php

use Illuminate\Support\Facades\Route;

Route::get('penjualan', [\App\Http\Controllers\Penjualan\PenjualanController::class, 'index'])->name('penjualan');
Route::get('penjualan/form', \App\Http\Livewire\Penjualan\PenjualanForm::class)->name('penjualan.form');

Route::get('penjualan/retur', [\App\Http\Controllers\Penjualan\PenjualanReturController::class, 'index'])->name('penjualan.retur');
Route::get('penjualan/retur/form', \App\Http\Livewire\Penjualan\PenjualanReturForm::class)->name('penjualan.retur.form');
