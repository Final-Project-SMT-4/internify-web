<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
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

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/form', [DashboardController::class, 'form']);

Route::resource('faq', FaqController::class);

Route::get('/template', function () {
    return view('layouts.template');
});