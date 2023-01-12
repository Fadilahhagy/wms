<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Models\Suppliers;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// Ini adalah fungsi route untuk menampilkan halaman
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/forgot_password', function () {
    return view('forgot_password');
});
Route::controller(RoomController::class) -> group(function() {
    Route::get('/room','index');
    Route::get('/room/{id}','show');
    Route::post('/room','store');
});


Route::controller(ReportController::class)->group(function() {
    Route::get('/report-item','indexItems');
    Route::post('/report-item','store');
    Route::get('/report-data','index');
    Route::put('/acc-report','accept_report');
    Route::put('/decline-report','decline-report');
});

Route::controller(UserController::class)->group(function() {
    Route::get('/users','index');
    Route::Put('/users','update');
    Route::delete('/users','destroy');
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
    Route::delete('/delete', [SupplierController::class, 'delete'])->name('supplier.delete');
    Route::get('search.supplier_search', [SupplierController::class, 'search'])->name('supplier.search');
    
    Route::post('/custom-logout', function () {
        auth()->logout();
        return redirect()->route('login');
    })->name('custom-logout');

    Route::middleware('isAdmin')->group(function() {
        
        Route::controller(ReportController::class)->group(function () {
            Route::get('/report-data','index');
            Route::put('/acc-report','accept_report');
            Route::put('/decline-report','decline_report');
        });
    
        Route::controller(UserController::class)->group(function() {
            Route::get('/users','index');
            Route::Put('/users','update');
            Route::delete('/users','destroy');
        });
    });

    
});