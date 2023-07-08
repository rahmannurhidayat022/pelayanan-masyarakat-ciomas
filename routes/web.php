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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', function () {
        return view('index');
    })->name('landing');
    Route::get('/pengaduan', 'PengaduanController@index')->name('public.pengaduan');
    Route::get('/kegiatan', 'KegiatanController@index')->name('public.kegiatan');
    Route::get('/pengajuan-surat', function () {
        return view('pengajuan');
    })->name('public.pengajuan');

    Route::group(['middleware' => ['guest']], function () {
        Route::get('/login', 'UserController@index')->name('login');
        Route::post('/auth/login', 'UserController@login')->name('auth.login');
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::post('/auth/logout', 'UserController@logout')->name('auth.logout');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    });
});
