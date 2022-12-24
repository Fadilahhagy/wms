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


// Ini adalah fungsi route untuk menampilkan halaman
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/forgot_password', function () {
    return view('forgot_password');
});
Route::get('/', function () {
    return view('supplier');
});
Route::get('/warehouse', function () {
    return view('warehouse');
});
Route::get('/room', function () {
    return view('room');
});
Route::get('/report_item', function () {
    return view('report_item');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});