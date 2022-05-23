<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ZonaController;
use App\Models\City;
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
    $city = City::all();
    return view('dashboard.index',compact('city'));
})->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Role
Route::get('/role', [RoleController::class, 'index'])->name('role');
Route::get('/createRole', [RoleController::class, 'create'])->name('createRole');
Route::post('/storeRole', [RoleController::class, 'store'])->name('storeRole');
Route::get('/editRole/{role}', [RoleController::class, 'edit'])->name('editRole');
Route::patch('/updateRole/{role}', [RoleController::class, 'update'])->name('updateRole');
Route::post('/deleteRole/{role}', [RoleController::class, 'destroy'])->name('deleteRole');
Route::get('/aksesRole/{role}', [RoleController::class, 'show'])->name('aksesRole');

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