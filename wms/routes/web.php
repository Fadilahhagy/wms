<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SupplierController;

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


// Ini adalah fungsi route untuk menampilkan halaman
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/forgot_password', function () {
    return view('forgot_password');
});
Route::get('/supplier', function () {
    return view('supplier');
});
Route::controller(RoomController::class) -> group(function() {
    Route::get('/room','index');
    Route::get('/room/{id}','roomDetail');
});


Route::get('/report_item', [ReportController::class ,'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::controller(ItemController::class)->group(function () {
    Route::get('/items', 'index');
    Route::post('/items', 'store');
});
//route source supplier
Route::resource('/supplier', SupplierController::class);
