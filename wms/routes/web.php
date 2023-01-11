<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;

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
    
Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/supplier', function () {
        return view('supplier');
    });
    Route::controller(RoomController::class) -> group(function() {
        Route::get('/room','index');
        Route::get('/room/live_search','live_search');
        Route::get('/room/{id}/items/condition/{condition}','show');
        Route::post('/room','store');
        Route::get('/room/form/{id}','edit');
        Route::put('/room/{id}','update');
    });
    
    
    Route::controller(ReportController::class)->group(function() {
        Route::get('/report-item','indexItems');
        Route::post('/report-item','store');
    });
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    
    Route::controller(ItemController::class)->group(function () {
        Route::get('/items', 'index');
        Route::post('/items', 'store');
        Route::delete('/items','delete');
        Route::put('/items/edit-condition','editCondition');
        Route::get('/items/form/{id}','edit');
        Route::get('/items/condition/{id}','get_by_condition');
        Route::get('/items/condition/{id}/live_search','live_search');
        Route::put('/items/{item_code}','update');
    });
    //route source supplier
    Route::resource('/supplier', SupplierController::class);
    Route::get('/edit', [SupplierController::class, 'edit'])->name('supplier.edit');

    
    Route::post('/custom-logout', function () {
        auth()->logout();
        return redirect()->route('login');
    })->name('custom-logout');

    Route::middleware('isAdmin')->group(function() {
        
        Route::controller(ReportController::class)->group(function () {
            Route::get('/report-data','index');
            Route::put('/acc-report','accept_report');
            Route::put('/decline-report','decline-report');
        });
    
        Route::controller(UserController::class)->group(function() {
            Route::get('/users','index');
            Route::Put('/users','update');
            Route::delete('/users','destroy');
        });
    });

    
});


