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

Route::post('helper/provinsi', [\App\Http\Controllers\Helper\AreaHelperController::class, 'province'])->name('helper-area.province');
Route::post('helper/city', [\App\Http\Controllers\Helper\AreaHelperController::class, 'city'])->name('helper-area.city');
Route::post('helper/salesarea', [\App\Http\Controllers\Helper\AreaHelperController::class, 'areaSelect2'])->name('helper-area.salesarea');

Route::post('helper/city/databales', [\App\Http\Controllers\Helper\AreaHelperController::class, 'cityDatatables'])->name('helper-area.city-datatables');

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

Route::post('master/produkkategori/datatables', [\App\Http\Controllers\Master\ProdukKategoriController::class, 'datatables'])->name('produk-kategori.datatables');
Route::delete('master/produkkategori', [\App\Http\Controllers\Master\ProdukKategoriController::class, 'destroy'])->name('produk-kategori.destroy');

Route::post('master/penerimacn/datatables', [\App\Http\Controllers\Master\PenerimaCNController::class, 'datatables'])->name('penerima-cn.datatables');
Route::delete('master/penerimacn', [\App\Http\Controllers\Master\PenerimaCNController::class, 'destroy'])->name('penerima-cn.destroy');

Route::post('master/produk/datatables', [\App\Http\Controllers\Master\ProdukController::class, 'datatables'])->name('produk.datatables');
Route::delete('master/produk', [\App\Http\Controllers\Master\ProdukController::class, 'destroy'])->name('produk.destroy');

Route::post('penjualan/datatables', [\App\Http\Controllers\Penjualan\PenjualanController::class, 'datatables'])->name('penjualan.datatables');
Route::delete('penjualan/invoice', [\App\Http\Controllers\Penjualan\PenjualanController::class, 'destroy'])->name('penjualan.destroy');

Route::post('penjualan/po/datatables', [\App\Http\Controllers\Penjualan\PenjualanPreOrderController::class, 'datatables'])->name('penjualan.po.datatables');
Route::delete('penjualan/po/invoice', [\App\Http\Controllers\Penjualan\PenjualanPreOrderController::class, 'destroy'])->name('penjualan.po.destroy');

Route::post('pembelian/po/datatables', [\App\Http\Controllers\Pembelian\PembelianPreOrderController::class,'datatables'])->name('pembelian.po.datatables');
Route::delete('pembelian/po/invoice', [\App\Http\Controllers\Pembelian\PembelianPreOrderController::class, 'destroy'])->name('pembelian.po.destroy');

Route::post('pembelian/datatables', [\App\Http\Controllers\Pembelian\PembelianController::class,'datatables'])->name('pembelian.datatables');
Route::delete('pembelian/invoice', [\App\Http\Controllers\Pembelian\PembelianController::class,'destroy'])->name('pembelian.destroy');

Route::post('penjualan/quotation/datatables', [\App\Http\Controllers\Penjualan\PenjualanQuotationController::class, 'datatables'])->name('penjualan.quotation.datatables');
Route::delete('penjualan/quotation', [\App\Http\Controllers\Penjualan\PenjualanQuotationController::class, 'destroy'])->name('penjualan.quotation.destroy');

Route::post('pembelian/quotation/datatables', [\App\Http\Controllers\Pembelian\PembelianQuotationController::class, 'datatables'])->name('pembelian.quotation.datatables');
Route::delete('pembelian/quotation', [\App\Http\Controllers\Pembelian\PembelianQuotationController::class, 'destroy'])->name('pembelian.quotation.destroy');
