<?php

use App\Http\Controllers\AkunMahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DospemController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\FileTemplateController;
use App\Http\Controllers\PlotingDosenController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\SuratBalasanController;
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


Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'checkRole'], function () {
        Route::resource('faq', FaqController::class);
        Route::resource('tempat-magang', TempatMagangController::class);
        Route::resource('file-template', FileTemplateController::class);
        Route::resource('prodi', ProdiController::class);
        Route::resource('dospem', DospemController::class);
        Route::resource('akun-mahasiswa', AkunMahasiswaController::class);
        Route::resource('proposal', ProposalController::class);
        Route::resource('surat-balasan', SuratBalasanController::class);
        
        Route::prefix('ploting-dosen')->name('ploting-dosen.')->group(function() {
            Route::resource('ploting-dosen', PlotingDosenController::class);
            Route::get('/import', [PlotingDosenController::class, 'showImport'])->name('import');
            Route::post('/post-import', [PlotingDosenController::class, 'storeImport'])->name('store-import');
            Route::post('/get-dosen-by-nidn', [PlotingDosenController::class, 'getDosenByNIDN'])->name('get-dosen-by-nidn');
        }); 
    });
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/form', [DashboardController::class, 'form']);

Route::get('/landing', function(){
    return view('user.landing');
});
Auth::routes([
    'register' => false, // Registration Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::get('/template', function () {
    return view('layouts.template');
});
Route::get('/', [LandingController::class, 'index']);
Route::get('/daftardosen', [LandingController::class, 'daftardosen']);
Route::get('/tempatmagang', [LandingController::class, 'tempatmagang']);
