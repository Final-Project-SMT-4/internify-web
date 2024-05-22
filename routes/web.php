<?php

use App\Http\Controllers\AkunMahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DospemController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FileTemplateController;
use App\Http\Controllers\ProposalController;
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

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/form', [DashboardController::class, 'form']);

Route::get('/landing', function(){
    return view('user.landing');
});
Auth::routes();
Route::resource('faq', FaqController::class);
Route::resource('tempat-magang', TempatMagangController::class);
Route::resource('file-template', FileTemplateController::class);
Route::resource('prodi', ProdiController::class);
Route::resource('dospem', DospemController::class);
Route::resource('akun-mahasiswa', AkunMahasiswaController::class);
Route::resource('proposal', ProposalController::class);

Route::get('/template', function () {
    return view('layouts.template');
});