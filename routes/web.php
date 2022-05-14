<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
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
    return view('dashboard.index');
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
