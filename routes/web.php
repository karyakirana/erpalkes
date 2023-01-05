<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function (){
    Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);

    //Upload Brosur Produk
    Route::get('/image', [\App\Http\Controllers\Upload\GambarBrosurController::class, 'index']);

    Route::controller(\App\Http\Controllers\Upload\UploadGambarBrosurController::class)->group(function () {
        Route::post('/upload', 'store')->name('upload');
        Route::delete('/hapus', 'destroy')->name('hapus');
    });

    Route::get('master/customer', [\App\Http\Controllers\Master\CustomerController::class, 'index'])->name('customer');
    Route::get('master/customer/{customer_id}/show', [\App\Http\Controllers\Master\CustomerController::class, 'show'])->name('customer.show');
    Route::get('master/customer/form', \App\Http\Livewire\Master\CustomerForm::class)->name('customer.form');
    Route::get('master/customer/form/{customer_id}', \App\Http\Livewire\Master\CustomerForm::class);

    Route::get('master/supplier', [\App\Http\Controllers\Master\SupplierController::class, 'index'])->name('supplier');
    Route::get('master/supplier/{supplier_id}/show', [\App\Http\Controllers\Master\SupplierController::class, 'show'])->name('supplier.show');
    Route::get('master/supplier/form', \App\Http\Livewire\Master\SupplierForm::class)->name('supplier.form');
    Route::get('master/supplier/form/{supplier_id}', \App\Http\Livewire\Master\SupplierForm::class)->name('supplier.form.edit');

    Route::get('master/jabatan', [\App\Http\Controllers\Master\JabatanController::class, 'index'])->name('jabatan');

    Route::get('master/pegawai', [\App\Http\Controllers\Master\PegawaiController::class, 'index'])->name('pegawai');
    Route::get('master/pegawai/{pegawai_id}/show', [\App\Http\Controllers\Master\PegawaiController::class, 'show'])->name('pegawai.show');
    Route::get('master/pegawai/form', \App\Http\Livewire\Master\PegawaiForm::class)->name('pegawai.form');
    Route::get('master/pegawai/form/{pegawai_id}', \App\Http\Livewire\Master\PegawaiForm::class)->name('pegawai.form.edit');

    Route::get('master/users', [\App\Http\Controllers\Master\UserController::class, 'index'])->name('users');
    Route::get('master/users/form', \App\Http\Livewire\Master\UsersForm::class)->name('users.form');
    Route::get('master/users/form/{user_id}', \App\Http\Livewire\Master\UsersForm::class)->name('users.form.edit');

    Route::get('master/sales', [\App\Http\Controllers\Master\SalesSupervisorController::class, 'index'])->name('sales');
    Route::get('master/sales/{sales_supervisor_id}/show', [\App\Http\Controllers\Master\SalesSupervisorController::class, 'show']);
    Route::get('master/sales/form', \App\Http\Livewire\Master\SalesSupervisorForm::class)->name('sales-supervisor.form');
    Route::get('master/sales/form/{sales_supervisor_id}', \App\Http\Livewire\Master\SalesSupervisorForm::class)->name('sales-supervisor.form.edit');

    Route::get('master/area', [\App\Http\Controllers\Master\AreaController::class, 'index'])->name('area');
    Route::get('master/area/form', \App\Http\Livewire\Master\AreaForm::class)->name('area.form');
    Route::get('master/area/form/{area_id}', \App\Http\Livewire\Master\AreaForm::class)->name('area.form.edit');

    Route::get('master/customercn', [\App\Http\Controllers\Master\CustomerCNController::class, 'index'])->name('customercn');
    Route::get('master/customercn/form', \App\Http\Livewire\Master\CustomercnForm::class)->name('customercn.form');
    Route::get('master/customercn/form/{customercn_id}', \App\Http\Livewire\Master\CustomercnForm::class)->name('customercn.form.edit');

    Route::get('master/produkkategori', [\App\Http\Controllers\Master\ProdukKategoriController::class, 'index'])->name('produk-kategori');

    Route::get('master/produksubkategori', [\App\Http\Controllers\Master\ProdukSubKategoriController::class, 'index'])->name('produk-sub-kategori');

    Route::get('master/produk', [\App\Http\Controllers\Master\ProdukController::class, 'index'])->name('produk');
    Route::get('master/produk/{produk_id}/show', [\App\Http\Controllers\Master\ProdukController::class, 'show'])->name('produk.show');
    Route::get('master/produk/form', \App\Http\Livewire\Master\ProdukForm::class)->name('produk.form');
    Route::get('master/produk/form/{produk_id}', \App\Http\Livewire\Master\ProdukForm::class);

    Route::get('master/lokasi', [\App\Http\Controllers\Master\LokasiController::class, 'index'])->name('lokasi');
});



//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/transaksi.php';
require __DIR__.'/persediaan.php';
