<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\HotlinedpdController;
use App\Http\Controllers\HotlinedpcController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardDpcController;
use App\Http\Controllers\DashboardDpdController;
// --------------------
// AUTH (Login & Logout)
// --------------------
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/get-kecamatan/{kabupaten_id}', [AnggotaController::class, 'getKecamatan']);


Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create')->middleware('auth');

// --------------------
// HOTLINE
// --------------------
Route::get('hotline-dpd', [HotlinedpdController::class, 'index'])->name('hotline.dpd');
Route::post('hotline/{id}/terima', [HotlinedpdController::class, 'terimaLaporan'])->name('hotline.terima');

// web.php
Route::get('/hotline/create', [LaporanController::class, 'create'])->name('laporan.create');
Route::post('/hotline', [LaporanController::class, 'store'])->name('laporan.store');
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');


Route::get('hotline-dpc', [HotlinedpcController::class, 'index'])->name('hotline.dpc');
Route::middleware('auth')->group(function () {
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::post('/laporan/{id}/terima', [LaporanController::class, 'terima'])->name('laporan.terima');
});

// --------------------
// DASHBOARD
// --------------------

// Route::get('/dashboard-dpd', function () {
//     return view('dashboard-dpd');
// })->middleware(['auth'])->name('dashboard.dpd');

Route::get('/dashboard-dpc', function () {
    return view('dashboard-dpc');
})->middleware(['auth'])->name('dashboard.dpc');

// --------------------
// ADMIN
// --------------------
Route::get('/data-admin', function () {
    return view('data-admin');
})->name('data.admin');

Route::get('/tambah-admin', [AdminController::class, 'create'])->name('admin.create');
Route::post('/tambah-admin', [AdminController::class, 'store'])->name('admin.store');

// --------------------
// DATA ANGGOTA - DPD
// --------------------
Route::get('/data-anggota-dpd', [AdminController::class, 'indexDpd'])->name('data.anggota.dpd');
Route::get('/kabupaten/{kabupaten}/anggota', [AdminController::class, 'modalAnggota'])->name('anggota.modal');
// --------------------
// DATA ANGGOTA - DPC

Route::get('/data-anggota-dpc', [AnggotaController::class, 'indexDpc'])->name('data.anggota.dpc');
// Route::get('/data-anggota-dpc/{id}', [AnggotaController::class, 'show'])->name('data.anggota.dpc.show');
Route::post('/data-anggota-dpc', [AnggotaController::class, 'store'])->name('data.anggota.dpc.store');
Route::put('/data-anggota-dpc/{anggota}', [AnggotaController::class, 'update']);
Route::delete('/data-anggota-dpc/{anggota}', [AnggotaController::class, 'destroy'])->name('data.anggota.dpc.destroy');
// Route::get('/data-anggota-dpc/tambah', [AnggotaController::class, 'create'])->name('data.anggota.dpc.create');

// --------------------
// REKAP & DOWNLOAD
// --------------------
Route::get('/rekap-anggota', [AnggotaController::class, 'rekap']);
Route::get('/downloaddpd', [DownloadController::class, 'index'])->name('download.data.dpd');

Route::post('/laporan/terima/{id}', [LaporanController::class, 'terima'])->name('laporan.terima');


Route::get('/download-data-pdf', [DownloadController::class, 'generatePDF'])->name('download.data.pdf');
Route::get('/download-dpc', [DownloadController::class, 'index'])->name('download.data.dpc')->middleware('auth');

Route::get('/dashboard-dpc', [DashboardDpcController::class, 'index'])->name('dashboard.dpc');
Route::get('/dashboard-dpd', [DashboardDPDController::class, 'index'])->name('dashboard.dpd');

// --------------------
// LANDING PAGE
// --------------------
Route::get('/', function () {
    return view('landing');
});
