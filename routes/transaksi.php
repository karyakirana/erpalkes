<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function (){
    //Penjualan
    Route::get('penjualan', [\App\Http\Controllers\Penjualan\PenjualanController::class, 'index'])->name('penjualan');
    Route::get('penjualan/form', \App\Http\Livewire\Penjualan\PenjualanForm::class)->name('penjualan.form');
    Route::get('penjualan/form/{penjualan_id}', \App\Http\Livewire\Penjualan\PenjualanForm::class);

    Route::get('penjualan/quotation', [\App\Http\Controllers\Penjualan\PenjualanQuotationController::class, 'index'])->name('penjualan.quotation');
    Route::get('penjualan/quotation/form', \App\Http\Livewire\Penjualan\PenjualanQuotationForm::class)->name('penjualan.quotation.form');

    Route::get('penjualan/retur', [\App\Http\Controllers\Penjualan\PenjualanReturController::class, 'index'])->name('penjualan.retur');
    Route::get('penjualan/retur/form', \App\Http\Livewire\Penjualan\PenjualanReturForm::class)->name('penjualan.retur.form');

    Route::get('penjualan/po', [\App\Http\Controllers\Penjualan\PenjualanPreOrderController::class, 'index'])->name('penjualan.po');
    Route::get('penjualan/po/form', \App\Http\Livewire\Penjualan\PenjualanPreOrderForm::class)->name('penjualan.po.form');



//Pembelian
    Route::get('pembelian', [\App\Http\Controllers\Pembelian\PembelianController::class, 'index'])->name('pembelian');
    Route::get('pembelian/form', \App\Http\Livewire\Pembelian\PembelianForm::class)->name('pembelian.form');

    Route::get('pembelian/quotation',[\App\Http\Controllers\Pembelian\PembelianQuotationController::class,'index'])->name('pembelian.quotation');
    Route::get('pembelian/quotation/form', \App\Http\Livewire\Pembelian\PembelianQuotaionForm::class)->name('pembelian.quotation.form');

    Route::get('pembelian/po', [\App\Http\Controllers\Pembelian\PembelianPreOrderController::class, 'index'])->name('pembelian.po');
    Route::get('pembelian/po/form', \App\Http\Livewire\Pembelian\PembelianPreOrderForm::class)->name('pembelian.po.form');



//Stock
    Route::get('stock/stockawal', [\App\Http\Controllers\Stock\StockAwalController::class, 'index'])->name('stock.awal');
    Route::get('stock/awal/form', \App\Http\Livewire\Stock\StockAwalForm::class)->name('stock.awal.form');
    Route::get('stock/awal/form/{stock_awal_id}', \App\Http\Livewire\Stock\StockAwalForm::class)->name('stock.awal.form.edit');

    Route::get('stock/stockmasuk', [\App\Http\Controllers\Stock\StockMasukController::class,'index'])->name('stock.masuk');
    Route::get('stock/masuk/form',[\App\Http\Livewire\Stock\StockMasukForm::class])->name('stock.masuk.form');
    Route::get('stock/masuk/form/{stock_masuk_id}',\App\Http\Livewire\Stock\StockMasukForm::class)->name('stock.masuk.form.edit');

    Route::get('stock/stockkeluar',[\App\Http\Controllers\Stock\StockKeluarController::class,'index'])->name('stock.keluar');
    Route::get('stock/keluar/form',[\App\Http\Livewire\Stock\StockKeluarForm::class])->name('stock.keluar.form');
    Route::get('stock/keluar/form/{stock_keluar_id}',\App\Http\Livewire\Stock\StockKeluarForm::class)->name('stock.keluar.form.edit');

    Route::get('stock/stocksaldo',[\App\Http\Controllers\Stock\StockSaldoController::class,'index'])->name('stock.saldo');
    Route::get('stock/saldo/form',[\App\Http\Livewire\Stock\StockSaldoForm::class])->name('stock.saldo.form');
    Route::get('stock/saldo/form/{stock_saldo_id}',\App\Http\Livewire\Stock\StockSaldoForm::class)->name('stock.saldo.form.edit');
});

