<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TempatMagangController;
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


Route::group(['middleware' => 'auth'], function(){
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::resource('tempat-magang', TempatMagangController::class);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/form', [DashboardController::class, 'form']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
