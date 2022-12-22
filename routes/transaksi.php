<?php

use Illuminate\Support\Facades\Route;

Route::get('penjualan', [\App\Http\Controllers\Penjualan\PenjualanController::class, 'index'])->name('penjualan');
Route::get('penjualan/form', \App\Http\Livewire\Penjualan\PenjualanForm::class)->name('penjualan.form');
Route::get('penjualan/form/{penjualan_id}', \App\Http\Livewire\Penjualan\PenjualanForm::class);

Route::get('penjualan/quotation', [\App\Http\Controllers\Penjualan\PenjualanQuotationController::class, 'index'])->name('penjualan.quotation');
Route::get('penjualan/quotation/form', \App\Http\Livewire\Penjualan\PenjualanQuotationForm::class)->name('penjualan.quotation.form');

Route::get('penjualan/retur', [\App\Http\Controllers\Penjualan\PenjualanReturController::class, 'index'])->name('penjualan.retur');
Route::get('penjualan/retur/form', \App\Http\Livewire\Penjualan\PenjualanReturForm::class)->name('penjualan.retur.form');

Route::get('stock/stockawal', [\App\Http\Controllers\Stock\StockAwalController::class, 'index'])->name('stock-awal');
Route::get('stock/awal/form', \App\Http\Livewire\Stock\StockAwalForm::class)->name('stock-awal.form');
Route::get('stock/awal/form/{stock_awal_id}', \App\Http\Livewire\Stock\StockAwalForm::class);

Route::get('pembelian/quotation',[\App\Http\Controllers\Pembelian\PembelianQuotationController::class,'index'])->name('pembelian.quotation');
Route::get('pembelian/quotation/form', \App\Http\Livewire\Pembelian\PembelianQuotaionForm::class)->name('pembelian.quotation.form');
