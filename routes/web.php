<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/neworg',[App\Http\Controllers\Auth\NewOrgController::class, 'index'])->name('neworg');
Route::post('/neworg',[App\Http\Controllers\Auth\NewOrgController::class, 'store'])->name('neworg.store');
Route::post('/show',[App\Http\Controllers\Auth\LoginController::class, 'show'])->name('show');
