<?php

use App\Http\Controllers\{
    DashboardController,
    KategoriController,
    JurusanController,
    AnggotaController,
    BukuController,
    LaporanController,
    TransaksiController
};
use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::resource('anggota', AnggotaController::class);

    Route::resource('kategori',KategoriController::class);

    Route::resource('jurusan', JurusanController::class);

    Route::resource('buku', BukuController::class);

    Route::resource('transaksi', TransaksiController::class);

    Route::get('/laporanPdf', [LaporanController::class, 'pdf']);
});
