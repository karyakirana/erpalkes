<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function (){
    Route::get('stock', [\App\Http\Controllers\Stock\StockController::class, 'index'])->name('stock');
    Route::get('persediaan', [\App\Http\Controllers\Persediaan\PersediaanController::class, 'index'])->name('persediaan');

    Route::get('persediaan/awal', [\App\Http\Controllers\Persediaan\PersediaanAwalController::class, 'index'])->name('persediaan.awal');
    Route::get('persediaan/awal/form', \App\Http\Livewire\Persediaan\PersediaanAwalForm::class)->name('persediaan.awal.form');
    Route::get('persediaan/awal/form/{persediaan_awal_id}', \App\Http\Livewire\Persediaan\PersediaanAwalForm::class)->name('persediaan.awal.form.edit');

    Route::get('persediaan/masuk',[\App\Http\Controllers\Persediaan\PersediaanMasukController::class,'index'])->name('persediaan.masuk');
    Route::get('persediaan/masuk/form', \App\Http\Livewire\Persediaan\PersediaanMasukForm::class)->name('persediaan.masuk.form');
    Route::get('persediaan/masuk/form/{persediaan_masuk_id}', \App\Http\Livewire\Persediaan\PersediaanMasukForm::class)->name('persediaan.masuk.form.edit');

    Route::get('persediaan/keluar', [\App\Http\Controllers\Persediaan\PersediaanKeluarController::class, 'index'])->name('persediaan.keluar');
    Route::get('persediaan/keluar/form', \App\Http\Livewire\Persediaan\PersediaanKeluarForm::class)->name('persediaan.keluar.form');
    Route::get('persediaan/keluar/form/{persediaan_keluar_id}', \App\Http\Livewire\Persediaan\PersediaanKeluarForm::class)->name('persediaan.keluar.form.edit');
});
