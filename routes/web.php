<?php

use App\Http\Controllers\ColorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});

Route::get('/tracking', function () {
    return view('customer.tracking');
});

Route::post('/datatracking', [TrackingController::class, 'show'])->name('datatracking');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// SALE
Route::middleware(['auth:sanctum', 'verified'])->resource('sale', SaleController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/sale/delete/{id}', [SaleController::class, 'delete'])->name('sale.delete');
Route::middleware(['auth:sanctum', 'verified'])->post('/sale/deleteall', [SaleController::class, 'deleteall'])->name('sale.deleteall');
Route::middleware(['auth:sanctum', 'verified'])->get('/sale-history/{date?}', [SaleController::class, 'history'])->name('sale.history');
// Route::middleware(['auth:sanctum', 'verified'])->get('/sale-ach/{param}', [SaleController::class, 'achievment'])->name('info.sale-ach');
// Route::middleware(['auth:sanctum', 'verified'])->post('/sale-simple', [SimpleSaleController::class, 'store'])->name('sale.simple-store');
// END SALE

// DOKUMEN
Route::middleware(['auth:sanctum', 'verified'])->resource('document', DokumenController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/document-history/{date?}', [DokumenController::class, 'history'])->name('document.history');
// END DOKUMEN

// USER
Route::middleware(['auth:sanctum', 'verified'])->resource('user', UserController::class);
Route::middleware(['auth:sanctum', 'verified'])->post('/user/deleteall', [UserController::class, 'deleteall'])->name('user.deleteall');
Route::middleware(['auth:sanctum', 'verified'])->get('/user/change/{id}/{status}', [UserController::class, 'changeStatus'])->name('user.update-status');
// END USER

// UNIT
Route::middleware(['auth:sanctum', 'verified'])->resource('unit', UnitController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/unit/delete/{id}', [UnitController::class, 'delete'])->name('unit.delete');
Route::middleware(['auth:sanctum', 'verified'])->post('/unit/deleteall', [UnitController::class, 'deleteall'])->name('unit.deleteall');
// END UNIT

// COLOR
Route::middleware(['auth:sanctum', 'verified'])->resource('color', ColorController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/color/delete/{id}', [ColorController::class, 'delete'])->name('color.delete');
Route::middleware(['auth:sanctum', 'verified'])->post('/color/deleteall', [ColorController::class, 'deleteall'])->name('color.deleteall');
// END COLOR

// STOCK
Route::middleware(['auth:sanctum', 'verified'])->resource('stock', StockController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/stock/delete/{id}', [StockController::class, 'delete'])->name('stock.delete');
Route::middleware(['auth:sanctum', 'verified'])->post('/stock/deleteall', [StockController::class, 'deleteall'])->name('stock.deleteall');
// END STOCK

