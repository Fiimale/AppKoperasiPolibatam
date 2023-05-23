<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SimpananController;
use App\Http\Middleware\UserAkses;
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
Route::middleware(['guest'])->group(function (){
    Route::get('/', [SessionController::class, 'index']);
    Route::get('/home', [SessionController::class, 'index']);
    Route::post('/home/login', [SessionController::class, 'login']);
    Route::post('/home/register', [SessionController::class, 'create']);    
});
Route::post('/home/logout', [SessionController::class, 'logout']);

Route::middleware(['auth'])->group(function (){
    Route::get('/anggota', [AnggotaController::class, 'index'])->middleware('userAkses:3');
    
    Route::get('/nasabah', [NasabahController::class, 'index'])->middleware('userAkses:1');
    Route::get('/nasabah/read', [NasabahController::class, 'read'])->name('nasabah.read');
    Route::post('/nasabah/create', [NasabahController::class, 'create'])->name('nasabah.create');
    Route::post('/nasabah/delete', [NasabahController::class, 'delete'])->name('nasabah.delete');
    Route::post('/nasabah/update', [NasabahController::class, 'update'])->name('nasabah.update');
    Route::post('/nasabah/read_file', [NasabahController::class, 'read_file'])->name('nasabah.read_file');

    Route::get('/simpanan', [SimpananController::class, 'index'])->middleware('userAkses:1');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('userAkses:1');

    Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('userAkses:1');
    Route::get('/registrasi/confirm', [RegistrasiController::class, 'confirm'])->middleware('userAkses:1');
    
    Route::get('/pinjaman', [PinjamanController::class, 'index'])->middleware('userAkses:1');
    Route::get('/laporan', [LaporanController::class, 'index'])->middleware('userAkses:1');
});





