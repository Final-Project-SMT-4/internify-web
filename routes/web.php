<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LandingController;
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


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/form', [DashboardController::class, 'form']);

Route::get('/landing', function(){
    return view('user.landing');
});
Auth::routes();
Route::resource('faq', FaqController::class);

Route::get('/template', function () {
    return view('layouts.template');
});
Route::get('/', [LandingController::class, 'index']);
Route::get('/daftardosen', [LandingController::class, 'daftardosen']);
Route::get('/tempatmagang', [LandingController::class, 'tempatmagang']);
