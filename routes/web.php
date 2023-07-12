<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', function () {
        return view('index');
    })->name('landing');
    Route::get('/pengaduan', 'PengaduanController@index')->name('public.pengaduan');
    Route::get('/kegiatan', 'KegiatanController@index')->name('public.kegiatan');
    Route::get('/kegiatan/{id}', 'KegiatanController@detail')->name('public.detail_kegiatan');
    Route::get('/pengajuan-surat', function () {
        return view('pengajuan');
    })->name('public.pengajuan');

    Route::group(['middleware' => ['guest']], function () {
        Route::get('/login', 'UserController@index')->name('login');
        Route::post('/auth/login', 'UserController@login')->name('auth.login');
        Route::post('/auth/logout', 'UserController@logout')->name('auth.logout');
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::post('/auth/logout', 'UserController@logout')->name('auth.logout');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        Route::prefix('penduduk')->group(function () {
            Route::get('/', 'PendudukController@index')->name('penduduk.index');
            Route::get('/anggota-keluarga/create', 'PendudukController@createAnggotaKeluarga')->name('penduduk.create_anggota_keluarga');
            Route::post('/anggota-keluarga/store', 'PendudukController@storeAnggotaKeluarga')->name('penduduk.store_anggota_keluarga');
            Route::get('/anggota-keluarga/{id}/edit', 'PendudukController@editAnggotaKeluarga')->name('penduduk.edit_anggota_keluarga');
            Route::put('/anggota-keluarga/{id}/update', 'PendudukController@updateAnggotaKeluarga')->name('penduduk.update_anggota_keluarga');
            Route::delete('/anggota-keluarga/{id}/destroy', 'PendudukController@destroyAnggotaKeluarga')->name('penduduk.destroy_anggota_keluarga');
            Route::get('/kartu-keluarga/create', 'PendudukController@createKartuKeluarga')->name('penduduk.create_kartu_keluarga');
            Route::post('/kartu-keluarga/store', 'PendudukController@storeKartuKeluarga')->name('penduduk.store_kartu_keluarga');
            Route::get('/kartu-keluarga/{id}/edit', 'PendudukController@editKartuKeluarga')->name('penduduk.edit_kartu_keluarga');
            Route::put('/kartu-keluarga/{id}/update', 'PendudukController@updateKartuKeluarga')->name('penduduk.update_kartu_keluarga');
            Route::delete('/kartu-keluarga/{id}/destroy', 'PendudukController@destroyKartuKeluarga')->name('penduduk.destroy_kartu_keluarga');
            Route::get('/get-kartu-keluarga', 'PendudukController@getKartuKeluarga')->name('penduduk.getKartuKeluarga');
            Route::get('/select2-kartu-keluarga', 'PendudukController@select2KartuKeluarga')->name('penduduk.select2KartuKeluarga');
        });
    });
});
