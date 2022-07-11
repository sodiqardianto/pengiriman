<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZonaController;
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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Role
    Route::get('/role', [RoleController::class, 'index'])->name('role');
    Route::get('/createRole', [RoleController::class, 'create'])->name('createRole');
    Route::get('/createPermission', [RoleController::class, 'createPermission'])->name('createPermission');
    Route::post('/insertPermission', [RoleController::class, 'insertPermission'])->name('insertPermission');
    Route::post('/storeRole', [RoleController::class, 'store'])->name('storeRole');
    Route::get('/editRole/{role}', [RoleController::class, 'edit'])->name('editRole');
    Route::post('/updateRole/{role}', [RoleController::class, 'update'])->name('updateRole');
    Route::post('/deleteRole/{role}', [RoleController::class, 'destroy'])->name('deleteRole');
    Route::get('/aksesRole/{role}', [RoleController::class, 'show'])->name('aksesRole');

    // USER
    Route::resource('users', UserController::class);

    // Zona
    Route::get('/zona', [ZonaController::class, 'index'])->name('zona');
    Route::get('/createZona', [ZonaController::class, 'create'])->name('createZona');
    Route::post('/storeZona', [ZonaController::class, 'store'])->name('storeZona');
    Route::get('/editZona/{zona}', [ZonaController::class, 'edit'])->name('editZona');
    Route::patch('/updateZona/{zona}', [ZonaController::class, 'update'])->name('updateZona');
    Route::post('/deleteZona/{zona}', [ZonaController::class, 'destroy'])->name('deleteZona');

    // City
    Route::get('/city', [CityController::class, 'index'])->name('city');
    Route::get('/createCity', [CityController::class, 'create'])->name('createCity');
    Route::post('/storeCity', [CityController::class, 'store'])->name('storeCity');
    Route::get('/editCity/{city}', [CityController::class, 'edit'])->name('editCity');
    Route::patch('/updateCity/{city}', [CityController::class, 'update'])->name('updateCity');
    Route::post('/deleteCity/{city}', [CityController::class, 'destroy'])->name('deleteCity');
    Route::get('/price', [CityController::class, 'price'])->name('price');
    Route::get('/priceCity', [CityController::class, 'pricecity'])->name('priceCity');
    Route::get('/city/data', [CityController::class, 'data'])->name('dataCity');
    Route::get('/totalharga', [CityController::class, 'totalharga'])->name('totalharga');
    // 
    Route::post('/getKabupaten', [CityController::class, 'getKabupaten'])->name('getKabupaten');
    Route::post('/getKecamatan', [CityController::class, 'getKecamatan'])->name('getKecamatan');
    Route::post('/getKelurahan', [CityController::class, 'getKelurahan'])->name('getKelurahan');


    // Transaction
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
    Route::get('/createTransaction', [TransactionController::class, 'create'])->name('createTransaction');
    Route::post('/storeTransaction', [TransactionController::class, 'store'])->name('storeTransaction');
    Route::get('/editTransaction/{transaction}', [TransactionController::class, 'edit'])->name('editTransaction');
    Route::patch('/updateTransaction/{transaction}', [TransactionController::class, 'update'])->name('updateTransaction');
    Route::post('/deleteTransaction/{transaction}', [TransactionController::class, 'destroy'])->name('deleteTransaction');
    Route::get('/inputBarang/{barang}', [TransactionController::class, 'show'])->name('inputBarang');
    Route::get('/check', [TransactionController::class, 'check'])->name('check');
    Route::get('/cetak/{transaction}', [TransactionController::class, 'show'])->name('cetak');

    // Report
    Route::get('/reportHarian', [ReportController::class, 'report'])->name('reportHarian');
    Route::get('/reportMingguan', [ReportController::class, 'reportMingguan'])->name('reportMingguan');
    Route::get('/reportBulanan', [ReportController::class, 'reportBulanan'])->name('reportBulanan');
    Route::get('/dataReport', [ReportController::class, 'dataReport'])->name('dataReport');
});
