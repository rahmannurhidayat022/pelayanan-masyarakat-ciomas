<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/download/{filename}', 'FileController@downloadFile')->name('download');

    Route::get('/', 'LandingController@index')->name('landing');
    Route::get('/pengaduan', 'PengaduanController@index')->name('public.pengaduan');
    Route::get('/kegiatan', 'KegiatanController@index')->name('public.kegiatan');
    Route::get('/kegiatan/{slug}', 'KegiatanController@detail')->name('public.detail_kegiatan');

    Route::prefix('pengajuan-surat')->group(function () {
        Route::get('/', 'PengajuanController@index')->name('public.pengajuan');
        Route::get('/manage-pengajuan-surat', 'PengajuanController@dashIndex')->name('pengajuan.index');
        Route::get('/manage-pengajuan-surat/{id}', 'PengajuanController@detail')->name('pengajuan.detail');
        Route::delete('/{id}/destroy', 'PengajuanController@destroy')->name('pengajuan.destroy');
    });

    Route::group(['middleware' => ['guest']], function () {
        Route::get('/login', 'UserController@index')->name('login');
        Route::post('/auth/login', 'UserController@login')->name('auth.login');
        Route::post('/auth/logout', 'UserController@logout')->name('auth.logout');
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::post('/auth/logout', 'UserController@logout')->name('auth.logout');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        Route::prefix('admin/kegiatan')->group(function () {
            Route::get('/', 'KegiatanController@adminIndex')->name('kegiatan.index');
            Route::get('/create', 'KegiatanController@create')->name('kegiatan.create');
            Route::get('/{id}/edit', 'KegiatanController@edit')->name('kegiatan.edit');
            Route::get('/{id}/preview', 'KegiatanController@preview')->name('kegiatan.preview');
            Route::post('/store', 'KegiatanController@store')->name('kegiatan.store');
            Route::put('/{id}/update', 'KegiatanController@update')->name('kegiatan.update');
            Route::delete('/{id}/destroy', 'KegiatanController@destroy')->name('kegiatan.destroy');
        });

        Route::prefix('/account')->group(function () {
            Route::get('/', 'UserController@accountList')->name('account.index');
            Route::post('/store', 'UserController@store')->name('account.store');
            Route::get('/{id}/edit', 'UserController@edit')->name('account.edit');
            Route::put('/{id}/update', 'UserController@update')->name('account.update');
            Route::delete('/{id}/destroy', 'UserController@destroy')->name('account.destroy');
        });

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

        Route::post('/surat-keluar', 'SuratKeluarController@store')->name('suratKeluar.store');
        Route::post('/reject-surat', 'PenolakanController@store')->name('penolakan.store');

        Route::get('/pengaduan/list', 'PengaduanController@datatable')->name('pengaduan.index');
        Route::put('/pengaduan/list/{id}/update', 'PengaduanController@changeIsRead')->name('pengaduan.update');
        Route::delete('/pengaduan/list/{id}/destroy', 'PengaduanController@destroy')->name('pengaduan.destroy');
    });

    Route::post('/store', 'PengajuanController@store')->name('public.pengajuan.store');
    Route::post('/pengajuan-surat/tracking', 'PengajuanController@tracking')->name('public.pengajuan.tracking');
    Route::get('/select2-anggota-keluarga', 'PendudukController@select2AnggotaKeluarga')->name('penduduk.select2AnggotaKeluarga');
    Route::post('/pengaduan/store', 'PengaduanController@store')->name('public.pengaduan.store');
});
