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

    Route::get('master/customer', [\App\Http\Controllers\Master\CustomerController::class, 'index'])->name('customer');
    Route::get('master/customer/form', \App\Http\Livewire\Master\CustomerForm::class)->name('customer.form');

    Route::get('master/supplier', [\App\Http\Controllers\Master\SupplierController::class, 'index'])->name('supplier');
    Route::get('master/supplier/form', \App\Http\Livewire\Master\SupplierForm::class)->name('supplier.form');
    Route::get('master/supplier/form/{supplier_id}', \App\Http\Livewire\Master\SupplierForm::class);

    Route::get('master/jabatan', [\App\Http\Controllers\Master\JabatanController::class, 'index'])->name('jabatan');

    Route::get('master/pegawai', [\App\Http\Controllers\Master\PegawaiController::class, 'index'])->name('pegawai');
    Route::get('master/pegawai/form', \App\Http\Livewire\Master\PegawaiForm::class)->name('pegawai.form');
    Route::get('master/pegawai/form/{pegawai_id}', \App\Http\Livewire\Master\PegawaiForm::class);

    Route::get('master/area', [\App\Http\Controllers\Master\AreaController::class, 'index'])->name('area');

    Route::get('master/penerimacn', [\App\Http\Controllers\Master\PenerimaCNController::class, 'index'])->name('penerima-cn');

    Route::get('master/produk', [\App\Http\Controllers\Master\ProdukController::class, 'index'])->name('produk');
});



//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
