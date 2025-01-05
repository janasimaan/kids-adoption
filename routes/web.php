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


////Dashboard////
Route::get('/login', [App\Http\Controllers\Dashboard\LoginController::class,'login'])->name('login');
Route::post('/submit-login', [App\Http\Controllers\Dashboard\LoginController::class,'submit_login'])->name('submit_login');
Route::post('/logout', [App\Http\Controllers\Dashboard\LoginController::class,'logout'])->name('logout');
Route::get('/dashboard', [App\Http\Controllers\Dashboard\DashboardController::class,'index'])->name('dashboard');
Route::post('/store_kid', [App\Http\Controllers\Dashboard\KidsController::class,'store'])->name('kids.store');
Route::get('/kid/{id}', [App\Http\Controllers\Dashboard\KidsController::class,'kid'])->name('kid');
Route::post('/update_kid/{id}', [App\Http\Controllers\Dashboard\KidsController::class,'update'])->name('kids.update');
////Dashboard////

////App////
Route::get('/', [App\Http\Controllers\AppController::class,'welcome'])->name('welcome');
Route::get('/index', [App\Http\Controllers\AppController::class,'index'])->name('index');
Route::get('/donate/{kidId}', [App\Http\Controllers\AppController::class,'donate'])->name('donate');
Route::post('/send_donation/{kidId}', [App\Http\Controllers\AppController::class,'send_donation'])->name('send_donation');
Route::get('/thank-you', [App\Http\Controllers\AppController::class,'thank_you'])->name('thank_you');
////App////
