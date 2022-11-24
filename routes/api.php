<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('master/customer/datatables', [\App\Http\Controllers\Master\CustomerController::class, 'datatables'])->name('customer.datatables');
Route::delete('master/customer', [\App\Http\Controllers\Master\CustomerController::class, 'destroy'])->name('customer.destroy');

Route::post('master/supplier/datatables', [\App\Http\Controllers\Master\SupplierController::class, 'datatables'])->name('supplier.datatables');
Route::delete('master/supplier', [\App\Http\Controllers\Master\SupplierController::class, 'destroy'])->name('supplier.destroy');

Route::post('master/area/datatables', [\App\Http\Controllers\Master\AreaController::class, 'datatables'])->name('area.datatables');
Route::delete('master/area', [\App\Http\Controllers\Master\AreaController::class, 'destroy'])->name('area.destroy');

Route::post('master/jabatan/datatables', [\App\Http\Controllers\Master\JabatanController::class, 'datatables'])->name('jabatan.datatables');
Route::delete('master/jabatan', [\App\Http\Controllers\Master\JabatanController::class, 'destroy'])->name('jabatan.destroy');

Route::post('master/supplier/datatables', [\App\Http\Controllers\Master\SupplierController::class, 'datatables'])->name('supplier.datatables');
Route::delete('master/supplier', [\App\Http\Controllers\Master\SupplierController::class, 'destroy'])->name('supplier.destroy');

Route::post('master/pegawai/datatables', [\App\Http\Controllers\Master\PegawaiController::class, 'datatables'])->name('pegawai.datatables');
Route::delete('master/pegawai', [\App\Http\Controllers\Master\PegawaiController::class, 'destroy'])->name('pegawai.destroy');
