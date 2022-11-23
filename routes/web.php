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

    Route::get('master/customer', [\App\Http\Controllers\Master\CustomerController::class, 'index']);
    Route::get('master/customer/form', \App\Http\Livewire\Master\CustomerForm::class)->name('customer.form');

    Route::get('master/supplier/form', \App\Http\Livewire\Master\SupplierForm::class)->name('supplier.form');
});



//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
