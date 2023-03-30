<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TanggapanController;
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

Route::get('/', [PengaduanController::class, 'pengaduanLanding'])->name('index');

Route::get('/register', [RegisterController::class, 'showRegisterMasyarakat'])->name('register');
Route::post('/register', [RegisterController::class, 'registerMasyarakat']);

Route::get('/login', [LoginController::class, 'showLoginMasyarakat'])->name('login');
Route::post('/login', [LoginController::class, 'loginMasyarakat']);

Route::get('/petugas/login', [LoginController::class, 'showLoginPetugas'])->name('petugas.login');
Route::post('/petugas/login', [LoginController::class, 'loginPetugas']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('isLogin')->group(function () {

    Route::middleware('isMasyarakat')->group(function () {
        Route::get('/masyarakat', [MasyarakatController::class, 'landing'])->name('masyarakat.landing');

        Route::get('/pengaduan', [PengaduanController::class,'index'])->name('pengaduan.index');
        Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
        Route::post('/pengaduan/store', [PengaduanController::class, 'store'])->name('pengaduan.store');
        Route::get('/pengaduan/edit/{id}', [PengaduanController::class, 'edit'])->name('pengaduan.edit');
        Route::post('/pengaduan/update/{id}', [PengaduanController::class, 'update'])->name('pengaduan.update');
        Route::get('/pengaduan/delete/{id}', [PengaduanController::class, 'delete'])->name('pengaduan.delete');
    });

    Route::middleware('isPetugasAdmin')->group(function () {
        Route::get('/petugas', [PetugasController::class,'landing'])->name('petugas.landing');

        Route::get('/petugas/masyarakat', [MasyarakatController::class, 'index'])->name('masyarakat.index');

        Route::get('/petugas/petugas', [PetugasController::class, 'index'])->name('petugas.index');

        Route::get('/petugas/pengaduan', [PengaduanController::class, 'indexPetugas'])->name('pengaduan.indexPetugas');
        Route::get('/petugas/pengaduan/delete/{id}', [PengaduanController::class, 'delete'])->name('pengaduan.deletePetugas');

        Route::get('/petugas/tanggapan', [TanggapanController::class, 'index'])->name('tanggapan.index');
        Route::get('/petugas/tanggapan/create/{id_pengaduan}', [TanggapanController::class, 'create'])->name('tanggapan.create');
        Route::post('/petugas/tanggapan/store/{id_pengaduan}', [TanggapanController::class, 'store'])->name('tanggapan.store');
        Route::get('/petugas/tanggapan/edit/{id}', [TanggapanController::class, 'edit'])->name('tanggapan.edit');
        Route::post('/petugas/tanggapan/update/{id}', [TanggapanController::class, 'update'])->name('tanggapan.update');
        Route::get('/petugas/tanggapan/delete/{id}', [TanggapanController::class, 'delete'])->name('tanggapan.delete');
    });

    Route::middleware('isAdmin')->group(function () {
        Route::get('/petugas/masyarakat/delete/{id}', [MasyarakatController::class, 'delete'])->name('masyarakat.delete');
    
        Route::get('/petugas/petugas/create', [PetugasController::class, 'create'])->name('petugas.create');
        Route::post('/petugas/petugas/store', [PetugasController::class, 'store'])->name('petugas.store');
        Route::get('/petugas/petugas/edit/{id}', [PetugasController::class, 'edit'])->name('petugas.edit');
        Route::post('/petugas/petugas/update/{id}', [PetugasController::class, 'update'])->name('petugas.update');
        Route::get('/petugas/petugas/delete/{id}', [PetugasController::class, 'delete'])->name('petugas.delete');
        
        Route::get('/petugas/generate_pdf', [TanggapanController::class, 'generatePDF'])->name('generate.pdf');

        Route::get('/petugas/log', [PetugasController::class, 'logging'])->name('petugas.log');
    });
    
});
