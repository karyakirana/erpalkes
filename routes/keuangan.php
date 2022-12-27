<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function (){

    Route::get('keuangan/akun',[\App\Http\Controllers\Keuangan\KeuanganAkunController::class,'index'])->name('keuangan.akun');
    Route::get('keuangan/akun/form', \App\Http\Livewire\Keuangan\AkunForm::class)->name('keuangan.akun.form');
    Route::get('keuangan/akun/form/{akun_id}',\App\Http\Livewire\Keuangan\AkunForm::class)->name('keuangan.akun.form.edit');

    Route::get('keuangan/akun/tipe', [\App\Http\Controllers\Keuangan\KeuanganAkunTipeController::class,'index'])->name('keuangan.akun.tipe');
    Route::get('keuangan/akun/tipe/form', \App\Http\Livewire\Keuangan\KeuanganAkunTipeForm::class)->name('keuangan.akun.tipe.form');
    Route::get('keuangan/akun/tipe/form/{akun_tipe_id}', \App\Http\Livewire\Keuangan\KeuanganAkunTipeForm::class)->name('keuangan.akun.tipe.form.edit');

    Route::get('keuangan/akun/kategori',[\App\Http\Controllers\Keuangan\KeuanganAkunKategoriController::class,'index'])->name('keuangan.akun.kategori');
    Route::get('keuangan/akun/kategori/form', \App\Http\Livewire\Keuangan\KeuanganAkunKategoriForm::class)->name('keuangan.akun.kategori.form.edit');
    Route::get('keuangan/akun/kategori/form/{akun_kategori_id}', \App\Http\Livewire\Keuangan\KeuanganAkunKategoriForm::class)->name('keuangan.akun.kategori.form.edit');

    Route::get('keuangan/penerimaan/penjualan', [\App\Http\Controllers\Keuangan\PenerimaanPenjualanController::class,'index'])->name('keuangan.penerimaan.penjualan');
    Route::get('keuangan/penerimaan/penjualan/form', \App\Http\Livewire\Keuangan\PenerimaanPenjualanForm::class)->name('keuangan.penerimaan.penjualan.form');
    Route::get('keuangan/penerimaan/penjualan/form/{penerimaan_penjualan_id}', \App\Http\Livewire\Keuangan\PenerimaanPenjualanForm::class)->name('keuangan.penerimaan.penjualan.form.edit');

    Route::get('keuangan/pengeluaran/pembelian', [\App\Http\Controllers\Keuangan\PengeluaranPembelianController::class,'index'])->name('pengeluaran.pembelian');
    Route::get('keuangan/pengeluaran/pembelian/form', \App\Http\Livewire\Keuangan\PengeluaranPembelianForm::class)->name('pengeluaran.pembelian.form');
    Route::get('keuangan/pengeluaran/pembelian/form/{pengeluaran_pembelian_id}', \App\Http\Livewire\Keuangan\PengeluaranPembelianForm::class)->name('pengeluaran.pembelian.form.edit');

    Route::get('keuangan/neraca', [\App\Http\Controllers\Keuangan\NeracaController::class,'index'])->name('keuangan.neraca');
    Route::get('keuangan/neraca/awal',[\App\Http\Controllers\Keuangan\KeuanganNeracaAwalController::class,'index'])->name('keuangan.neraca.awal');

    Route::get('keuangan/piutang', [\App\Http\Controllers\Keuangan\PiutangController::class,'index'])->name('keuangan.piutang');
    Route::get('keuangan/piutang/detail/{customer_id}',\App\Http\Livewire\Keuangan\PiutangDetail::class)->name('piutang.detail');
    Route::get('keuangan/hutang', [\App\Http\Controllers\Keuangan\HutangController::class,'index'])->name('keuangan.hutang');
    Route::get('keuangan/hutang/detail/{supplier_id}', \App\Http\Livewire\Keuangan\HutangDetail::class)->name('keuangan.hutang.detail');
});
