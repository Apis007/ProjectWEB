<?php

use App\Http\Controllers\DataKendaraanController;
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

// Example Routes
Route::view('/', 'landing');
Route::match(['get', 'post'], '/dashboard', function(){
    return view('dashboard');
});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');
Route::view('/pages/datakendaraan','pages.datakendaraan');
Route::view('/pages/riwayattransaksi','pages.riwayattransaksi');

Route::get('pages/datakendaraan', [DataKendaraanController::class, 'index'])->name('datakendaraan.index');
Route::get('/pages/datakendaraan/create', [DataKendaraanController::class, 'create']);
Route::post('/datakendaraan', [DataKendaraanController::class, 'store'])->name('datakendaraan.store');
