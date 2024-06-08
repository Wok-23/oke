<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PembelianController;

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

Route::get('/',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/role', RoleController::class)->middleware('admin');
Route::resource('/dashboard/user', UserController::class)->middleware('admin');
Route::resource('/dashboard/pengajuan-barang', PembelianController::class)->middleware('office');

Route::get('/dashboard/pengajuan-manager',[PembelianController::class, 'manager_list'])->middleware('manager');
Route::put('/dashboard/pengajuan-manager/{pengajuan_manager}',[PembelianController::class, 'manager_reject'])->middleware('manager');
Route::put('/dashboard/pengajuan-manager/approve/{pengajuan_manager}',[PembelianController::class, 'manager_approve'])->middleware('manager');
Route::get('/dashboard/history-manager',[PembelianController::class, 'manager_history'])->middleware('manager');

Route::get('/dashboard/pengajuan-finance',[PembelianController::class, 'finance_list'])->middleware('finance');
Route::put('/dashboard/pengajuan-finance/{pengajuan_finance}',[PembelianController::class, 'finance_reject'])->middleware('finance');
Route::put('/dashboard/pengajuan-finance/approve/{pengajuan_finance}',[PembelianController::class, 'finance_approve'])->middleware('finance');
Route::get('/dashboard/history-finance',[PembelianController::class, 'finance_history'])->middleware('finance');