<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Kwitansi\KwitansiKolomController;
use App\Http\Controllers\Sistem\SistemSetupController;
use App\Http\Controllers\UserMenuController;
use Illuminate\Support\Facades\Route;


    Route::prefix('sistem')->group(function () {
        Route::controller(SistemSetupController::class)->group(function () {
            Route::get('/setup', 'setup');
            Route::get('/setup/simpan', 'sistem/setup/simpan');
        });
    });



    Route::prefix('kwitansi')->group(function () {
        Route::controller(KwitansiKolomController::class)->group(function () {
            Route::get('/kolom', 'kolom');
            Route::post('/kolom/save-all', 'saveAllKwitansiKolom')->name('save-all');
            // iklan kolom
            Route::get('/search/kode-area-kolom', 'searchKodeAreaKolom');
            Route::get('/search/jenis-bayar', 'searchJenisBayar');
            Route::get('/search/kode-agen-kolom/{kodeArea}', 'searchKodeAgenKolom');
            Route::get('/generate/no-kwitansi-area-kolom/{kodeArea}', 'generateNoKwitansiAreaKolom');
            Route::get('/search/type-kolom', 'searchTypeKolom');
            Route::get('/search/nota-iklan-kolom', 'searchNotaIklanKolom');
            Route::post('/add/nota-iklan-kolom', 'addNotaIklanKolom');
            Route::post('/add/pembayaran-iklan-kolom', 'addPembayaranIklanKolom');
            // biaya kolom
            Route::get('/search/kode-biaya-kolom', 'searchKodeBiayaKolom');
            Route::post('/add/jumlah-biaya-kolom', 'addJumlahBiayaKolom');
        });
    });

    Route::controller(UserMenuController::class)->prefix('user-menu')->group(function () {
        Route::get('/list-user', 'listUser');
        Route::post('/store-user', 'storeUser')->name('user-menu/store-user');
        Route::post('/update-user', 'updateUser')->name('user-menu/update-user');
        Route::get('/list-menu', 'listMenu');
        Route::post('/store-menu', 'storeMenu')->name('user-menu/store-menu');
        Route::post('/update-menu', 'updateMenu')->name('user-menu/update-menu');
        Route::get('/detail-user-menu/{kduser}', 'detailUserMenu');
        Route::post('/update-user-menu', 'updateUserMenu')->name('user-menu/update-user-menu');
        Route::get('/list-level', 'listLevel');
        Route::post('/store-level', 'storeLevel')->name('user-menu/store-level');
        Route::post('/update-level', 'updateLevel')->name('user-menu/update-level');
    });

