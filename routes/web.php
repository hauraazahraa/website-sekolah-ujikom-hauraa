<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\MerchandiseController;
use App\Http\Controllers\Admin\ProfilSekolahController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\HelpCenterController;
use App\Models\Galeri;
use App\Models\Merchandise;
use App\Models\Pengumuman;
use App\Models\ProfilSekolah;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $merchandise = Merchandise::where('status', 'aktif')->latest()->get();
    $profilSekolah = ProfilSekolah::first();
    $galeriFotos = Galeri::latest()->get();
    $pengumumanAktif = Pengumuman::where('status', 'aktif')->orderByDesc('tanggal')->get();

    return view('welcome', compact('merchandise', 'profilSekolah', 'galeriFotos', 'pengumumanAktif'));
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::get('/profil', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');

    Route::get('/help-center', [HelpCenterController::class, 'index'])->name('help-center.index');

    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
    Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::put('/pengumuman/{pengumuman}', [PengumumanController::class, 'update'])->name('pengumuman.update');
    Route::delete('/pengumuman/{pengumuman}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');

    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
    Route::put('/galeri/{galeri}', [GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{galeri}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

    Route::get('/merchandise', [MerchandiseController::class, 'index'])->name('merchandise.index');
    Route::post('/merchandise', [MerchandiseController::class, 'store'])->name('merchandise.store');
    Route::put('/merchandise/{merchandise}', [MerchandiseController::class, 'update'])->name('merchandise.update');
    Route::delete('/merchandise/{merchandise}', [MerchandiseController::class, 'destroy'])->name('merchandise.destroy');

    Route::get('/data-sekolah', [ProfilSekolahController::class, 'edit'])->name('data-sekolah.edit');
    Route::put('/data-sekolah', [ProfilSekolahController::class, 'update'])->name('data-sekolah.update');

    Route::get('/pengaturan', [PengaturanController::class, 'edit'])->name('pengaturan.edit');
    Route::put('/pengaturan', [PengaturanController::class, 'update'])->name('pengaturan.update');
});