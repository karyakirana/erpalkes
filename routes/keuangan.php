<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function (){

    Route::get('keuangan/akun');
    Route::get('keuangan/akun/form');
    Route::get('keuangan/akun/form/{akun_id}');

    Route::get('keuangan/akun/tipe');
    Route::get('keuangan/akun/tipe/form');
    Route::get('keuangan/akun/tipe/form/{akun_tipe_id}');

    Route::get('keuangan/akun/kategori');
    Route::get('keuangan/akun/kategori/form');
    Route::get('keuangan/akun/kategori/form/{akun_kategori_id}');

    Route::get('keuangan/penerimaan/penjualan');
    Route::get('keuangan/penerimaan/penjualan/form');
    Route::get('keuangan/penerimaan/penjualan/form/{penerimaan_penjualan_id}');

    Route::get('keuangan/pengeluaran/pembelian');
    Route::get('keuangan/pengeluaran/pembelian/form');
    Route::get('keuangan/pengeluaran/pembelian/form/{pengeluaran_pembelian_id}');

    Route::get('keuangan/neraca');
    Route::get('keuangan/neraca/awal');

    Route::get('keuangan/piutang');
    Route::get('keuangan/piutang/detail/{customer_id}');
    Route::get('keuangan/hutang');
    Route::get('keuangan/hutang/detail/{supplier_id}');
});
